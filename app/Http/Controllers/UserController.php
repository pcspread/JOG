<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Request読込
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
// Model読込
use App\Models\User;
// Hash読込
use Illuminate\Support\Facades\Hash;
// Mail読込
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;
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
        ]);

        return redirect('/verify/email');
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

        // ログインチェック
        if (Auth::attempt($form)) {
            // ユーザー情報取得
            $user = User::where('email', $form['email'])->first();
            // メール認証が未完了の場合
            if (empty($user['email_verified_at'])) {
                return back()->with('danger', 'メール認証が未完了です');
            } else {
                // セッションID再生成
                $request->session()->regenerate();
                return redirect('/')->with('success', 'ログインしました');
            }
        }
    
        // ログイン情報と一致しない場合
        return back()->with('danger', '登録情報が見つかりませんでした');
    }

    /**
     * view表示
     * 認証メール送信済ページ
     * @param void
     * @return view
     */
    public function indexMail()
    {
        return view('auth.verify_email');
    }

    /**
     * view表示
     * 認証メール再送
     * @param object $request
     * @return back
     */
    public function resendMail(Request $request)
    {
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
