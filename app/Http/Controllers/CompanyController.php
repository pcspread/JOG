<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Auth読込
use Illuminate\Support\Facades\Auth;
// Model読込
use App\Models\Job;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Applicant;
use App\Models\User;
// Request読込
use App\Http\Requests\JobRequest;
use App\Http\Requests\QuestionRequest;
// DB読込
use Illuminate\Support\Facades\DB;
// Log読込
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    /**
     * view表示
     * メインページ
     * @param void
     * @return view
     */
    public function indexCompany()
    {
        if (!Auth::check()) {
            return back()->with('danger', 'ログインが必要です');
        }

        // 掲載希望のユーザーかどうかのチェック
        if (empty(Auth::user()['company'])) {
            return back()->with('danger', '新規登録時に、求人掲載の欄にチェックが必要です');
        }

        // 求人情報の取得
        $jobs = Job::where('user_id', Auth::id())->get();

        return view('company.main', compact('jobs'));
    }

    /**
     * view表示
     * 求人詳細ページ
     * @param ind $id
     * @return view
     */
    public function showCompany($id)
    {
        // 求人情報の取得
        $job = Job::find($id);

        return view('company.detail_job', compact('job'));
    }

    /**
     * view表示
     * 求人詳細修正ページ
     * @param int $id
     * @return view
     */
    public function editCompany($id)
    {
        // 求人情報の取得
        $job = Job::find($id);

        // ジャンル情報の取得
        $genres = Genre::all();

        // エリア情報の取得
        $areas = Area::all();

        return view('company.edit_job', compact('job', 'genres', 'areas'));
    }

    /**
     * 求人詳細更新処理
     * @param int $id
     * @param object $request
     * @return view
     */
    public function updateCompany($id, JobRequest $request)
    {
        // フォーム情報の取得
        $form = $request->only(['genre_id','area_id','name','content','email','tel','salary','time','shift','location']);

        // トランザクション開始
        DB::beginTransaction();

        try {
            // 新しいジャンルの入力がある場合
            if (!empty($request['genre'])) {
                // 新しいジャンル情報の有無を確認
                $genre = Genre::where('name', $request['genre'])->first();
                // 新しいジャンルが既に存在する場合
                if (!empty($genre)) {
                    $genre = $genre['id'];
                } else {
                    // create処理
                    Genre::create([
                        'name' => $request['genre'],
                    ]);
                    // ジャンルIDの格納
                    $genre = Genre::where('name', $request['genre'])->first()['id'];
                }
                
            } else {
                $genre = $form['genre_id'];
            }
    
            // create処理
            Job::find($id)->update([
                'genre_id' => $genre,
                'area_id' => $form['area_id'],
                'name' => $form['name'],
                'content' => $form['content'],
                'email' => $form['email'],
                'tel' => $form['tel'],
                'salary' => $form['salary'],
                'time' => $form['time'],
                'shift' => $form['shift'],
                'location' => $form['location'],
            ]);
            DB::commit();
        } catch (\PDOException $e) {
            DB::rollback();
            // エラー内容の保存
            Log::error('データベース接続失敗', [
                'content' => $e->getMessage(),
                'location' => $e->getFile(),
                'row' => $e->getLine(),
            ]);
        }
        
        return back()->with('success', '求人を更新しました');
    }

    /**
     * view表示
     * 求人作成ページ
     * @param void
     * @return view
     */
    public function createJob()
    {
        // ジャンル情報の取得
        $genres = Genre::all();

        // エリア情報の取得
        $areas = Area::all();
    
        return view('company.create_job', compact('genres', 'areas'));
    }

    /**
     * 求人作成処理
     * @param object $request
     * @return back
     */
    public function storeJob(JobRequest $request)
    {
        // フォーム情報の取得
        $form = $request->only(['genre_id','area_id','name','content','email','tel','salary','time','shift','location']);

        // トランザクション開始
        DB::beginTransaction();

        try {
            // 新しいジャンルの入力がある場合
            if (!empty($request['genre'])) {
                // 新しいジャンル情報の有無を確認
                $genre = Genre::where('name', $request['genre'])->first();
                // 新しいジャンルが既に存在する場合
                if (!empty($genre)) {
                    $genre = $genre['id'];
                } else {
                    // create処理
                    Genre::create([
                        'name' => $request['genre'],
                    ]);
                    // ジャンルIDの格納
                    $genre = Genre::where('name', $request['genre'])->first()['id'];
                }
                
            } else {
                $genre = $form['genre_id'];
            }
    
            // create処理
            Job::create([
                'user_id' => Auth::id(),
                'genre_id' => $genre,
                'area_id' => $form['area_id'],
                'name' => $form['name'],
                'content' => $form['content'],
                'email' => $form['email'],
                'tel' => $form['tel'],
                'salary' => $form['salary'],
                'time' => $form['time'],
                'shift' => $form['shift'],
                'location' => $form['location'],
            ]);
            DB::commit();
        } catch (\PDOException $e) {
            DB::rollback();
            // エラー内容の保存
            Log::error('データベース接続失敗', [
                'content' => $e->getMessage(),
                'location' => $e->getFile(),
                'row' => $e->getLine(),
            ]);
        }
        
        return back()->with('success', '求人を作成しました');
    }

    /**
     * view表示
     * 応募詳細ページ
     * @param int $id
     * @return view
     */
    public function showApplicant($id)
    {
        // 応募情報の取得
        $applicant = Applicant::find($id);

        return view('company.detail_applicant', compact('applicant'));
    }

    /**
     * 応募結果送信処理
     * @param int $id
     * @param object $request
     * @return back
     */
    public function updateApplicant($id, Request $request)
    {
        // 「通過」が押された場合
        if ($request['result'] === 'success') {
            Applicant::find($id)->update([
                'result' => 1,
            ]);
            return back()->with('success', '通過メッセージを送信しました');
        } elseif ($request['result'] === 'failure') {
            // 「断る」が押された場合
            Applicant::find($id)->update([
                'result' => 0,
            ]);
            return back()->with('success', '断りのメッセージを送信しました');
        }
    }

    /**
     * 質問返答処理
     * @param int $id
     * @param object $request
     * @return back
     */
    public function updateQuestion ($id, QuestionRequest $request) {
        // フォーム情報の取得
        $form = $request->only('answer');

        // update処理
        Applicant::find($id)->update($form);      

        return back()->with('success', '返答が完了しました');
    }
}