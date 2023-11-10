<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Request読込
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\ResetRequest;
// Model読込
use App\Models\User;
// Hash読込
use Illuminate\Support\Facades\Hash;
// Mail読込
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;
use App\Mail\ResetMail;
// Carbon読込
use Carbon\Carbon;
// Auth読込
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * view表示
     * 新規登録ページ
     * @param void
     * @return view
     */
    public function indexRegister()
    {
        return view('auth.register');
    }

    /**
     * create処理
     * 新規登録処理
     * @param object $request
     * @return redirect
     */
    public function register(RegisterRequest $request)
    {
        // フォーム情報の取得
        $form = $request->only('email', 'password', 'company');

        // token作成
        $token = bin2hex(random_bytes(32));

        if (empty($form['company'])) {
            // 企業掲載チェックが無い場合
            $company = 0;
        } else {
            // 企業掲載チェックがある場合
            $company = 1;
        }

        // create処理
        User::create([
            'email' => $form['email'],
            'password' => Hash::make($form['password']),
            'company' => $company,
            'remember_token' => Hash::make($token),
        ]);

        // 認証メール送信
        Mail::send(new VerifyMail($form['email'], $token));
        
        // 認証メールの二重送信防止処理
        $request->session()->regenerateToken();

        // セッションに再送に必要な情報を格納
        session()->put([
            'email' => $form['email'],
            'token' => $token,
            'access' => 1,
        ]);

        return redirect('/verify/email');
    }

    /**
     * view表示
     * 認証メール送信済ページ
     * @param void
     * @return view
     */
    public function indexMail()
    {
        // 新規登録手順を踏んでいない場合
        if (empty(session('access'))) {
            return redirect('/register');
        }

        return view('auth.verify_email');
    }

    /**
     * 認証メール再送
     * @param object $request
     * @return back
     */
    public function resendMail(Request $request)
    {
        // 新規登録手順を踏んでいない場合
        if (empty(session('access'))) {
            return redirect('/register');
        }
        
        // メール送信処理
        Mail::send(new VerifyMail(session('email'), session('token')));
        
        // メールの二重送信防止処理
        $request->session()->regenerateToken();

        return back()->with('success', '認証メールを再送しました');
    }

    /**
     * view表示
     * 新規登録完了ページ
     * @param object $request
     * @return view
     */
    public function indexThanks(Request $request)
    {
        // token情報を取得
        $token = $request->token;

        // トークンが無い場合
        if (empty($token)) {
            return redirect('/register');
        }

        // ユーザー情報の取得
        $users = User::all();

        foreach ($users as $user) {
            // tokenと照合
            if (Hash::check($token, $user['remember_token'])) {
                $user->email_verified_at = Carbon::now()->__toString();
                $user->save();
                return view('auth.thanks');
            }
        }
        
        return redirect('/register')->with('danger', '登録情報がございません');
    }

    /**
     * view表示
     * ログインページ
     * @param void
     * @return view
     */
    public function indexLogin()
    {
        return view('auth.login');
    }

    /**
     * login処理
     * @param object $request
     * @return redirect,back
     */
    public function login(LoginRequest $request)
    {
        // フォーム情報の取得
        $form = $request->only(['email', 'password']);

        // ユーザー情報取得
        $user = User::where('email', $form['email'])->first();

        // ユーザー情報がある場合
        if (!empty($user)) {
            // メール認証が未完了の場合
            if (empty($user['email_verified_at'])) {
                return back()->with('danger', 'メール認証が未完了です');
            } else {
                // ログインチェック
                if (Auth::attempt($form)) {
                    // セッションID再生成
                    $request->session()->regenerate();
                    session()->put('visit', 1);
                    return redirect('/')->with('success', 'ログインしました');
                }
            }
        }
    
        // ログイン情報と一致しない場合
        return back()->with('danger', '登録者情報が見つかりませんでした');
    }

    /**
     * view表示
     * パスワード変更送信ページ
     * @param void
     * @return view
     */
    public function indexReset()
    {
        return view('auth.reset');
    }

    /**
     * パスワード変更送信処理
     * @param object $request
     * @return back
     */
    public function sendReset(EmailRequest $request)
    {
        // フォーム情報の取得
        $email = $request->only('email');

        // トークン生成
        $token = bin2hex(random_bytes(32));
        
        // ユーザーデータを取得
        $user = User::where('email', $email)->first();

        // ユーザーデータが無い場合
        if (empty($user)) {
            return back()->with('danger', '登録者情報が見つかりませんでした');
        }

        // トークンを挿入
        $user->update([
            'remember_token' => Hash::make($token),
        ]);
        
        // メール送信
        Mail::send(New ResetMail($email, $token));

        // メールの二重送信防止処理
        $request->session()->regenerateToken();
        
        return back()->with('success', 'パスワード変更確認メールを送信しました');
    }

    /**
     * view表示：パスワード変更ページ
     * @param object $request
     * @param view
     */
    public function indexResetPassword(Request $request)
    {
        // トークンを取得
        $token = $request->token;
        
        // トークンがあるかどうかの確認
        if (empty($token)) {
            return redirect('/reset');
        }

        // トークンをセッションに格納
        session()->put('token', $token);

        return view('auth.reset_password');
    }

    /**
     * パスワード変更処理
     * @param object $request
     * @return back
     */
    public function updateResetPassword(ResetRequest $request)
    {
        // トークンがある場合
        if (!empty(session('token'))) {
            // フォーム情報の取得
            $password = $request->password;
            $confirm_password = $request->password_confirmation;
    
            // パスワードと確認用パスワードが異なっている場合
            if ($password !== $confirm_password) {
                return back()->with('danger', 'パスワードと確認用パスワードが異なっています');
            }
    
            // ユーザー情報を全件取得
            $users = User::all();
    
            // ユーザー情報のトークンを照合
            foreach($users as $user) {
                if (Hash::check(session('token'), $user['remember_token'])) {
                    // update処理
                    $user->update([
                        'password' => Hash::make($password),
                    ]);
                    return redirect('/login')->with('success', 'パスワードを変更しました');
                }
            }
        }

        return redirect('/reset')->with('danger', 'パスワード変更にはメール確認が必要です');
    }

    /**
     * ログアウト処理
     * @param object $request 
     * @return redirect
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'ログアウトしました');
    }
}
