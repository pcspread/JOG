<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Model読込
use App\Models\Job;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Favorite;
use App\Models\Applicant;
// Auth読込
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * view表示
     * トップページ
     * @param void
     * @return view
     */
    public function indexTop()
    {
        return view('top');
    }

    /**
     * view表示
     * 求人一覧ページ
     * @param void
     * @return view
     */
    public function indexJobs()
    {
        // ページ遷移用の値の格納
        session()->put('page', 'jobs');

        // 求人情報の取得
        $jobs = Job::all();

        // ジャンル情報の取得
        $genres = Genre::all();

        // エリア情報の取得
        $areas = Area::all();

        // セッションに情報を格納
        if (empty(session('keySearch'))) {
            session()->put([
                'jobs' =>$jobs
            ]);
        }

        return view('job.jobs', compact('genres', 'areas'));
    }

    /**
     * 求人検索処理
     * @param object $request
     * @return view
     */
    public function searchJobs(Request $request) {
        // キーワード検索結果を格納
        $jobs = Job::AreaSearch($request->area)->GenreSearch($request->genre)->get();

        // セッションに情報を格納
        session()->put([
            'keySearch' => 1, 
            'jobs' => $jobs
        ]);

        return back();
    }

    /**
     * 求人検索リセット処理
     * @param void
     * @return back
     */
    public function searchReset()
    {
        // 検索情報キーの削除
        session()->forget('keySearch');
        
        return back();
    }

    /**
     * view表示
     * 求人詳細ページ
     * @param int $id
     * @return view
     */
    public function showJob($id)
    {
        // 訪問件数調査
        $visit = session('visit') + 1;
        session()->put('visit', $visit);
        
        // 訪問件数が1の場合
        if (session('visit') === 1) {
            Job::find($id)->increment('visit', 1);
        }
        
        // 求人情報の取得
        $job = Job::find($id);

        // 応募情報の取得
        $applicant = Applicant::where('user_id', Auth::id())->where('job_id', $id)->first();

        $favorite = Favorite::where('user_id', Auth::id())->where('job_id', $job['id'])->first();

        return view('job.detail_job', compact('job', 'favorite', 'applicant'));
    }

    /**
     * view表示
     * マイページ
     * @param void
     * @return view
     */
    public function indexMypage()
    {
        // ページ遷移用の値の格納
        session()->put('page', 'mypage');

        // お気に入り情報の取得
        $itemsFavorite = Favorite::where('user_id', Auth::id())->get();
        
        // お気に入りレコード格納用の変数を定義
        $recodesFavorite = [];

        // レコード情報の格納
        foreach($itemsFavorite as $favorite) {
            if (Job::find($favorite['job_id'])) {
                $recodesFavorite[] = Job::find($favorite['job_id']);
            }
        }
        // コレクションの作成
        $favorites = collect($recodesFavorite);

        // 応募中情報の取得
        $itemsApplicant = Applicant::where('user_id', Auth::id())->get();
        
        // 応募中レコードを格納する変数を定義
        $recordsApplicant = [];

        // レコード情報の格納
        foreach($itemsApplicant as $applicant) {
            if (Job::find($applicant['job_id'])) {
                $recordsApplicant[] = Job::find($applicant['job_id']);
            }
        }

        // コレクション作成
        $applicants = collect($recordsApplicant);
        
        return view('job.mypage', compact('favorites', 'applicants'));
    }
}
