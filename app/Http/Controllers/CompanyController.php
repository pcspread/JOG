<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Auth読込
use Illuminate\Support\Facades\Auth;
// Model読込
use App\Models\Job;

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
        return view('company.detail_job');
    }

    /**
     * view表示
     * 求人詳細修正ページ
     * @param int $id
     * @return view
     */
    public function editCompany($id)
    {
        return view('company.edit_job');
    }

    /**
     * view表示
     * 求人作成ページ
     * @param void
     * @return view
     */
    public function createJob()
    {
        return view('company.create_job');
    }

    /**
     * view表示
     * 応募詳細ページ
     * @param int $id
     * @return view
     */
    public function showApplicant($id)
    {
        return view('company.detail_applicant');
    }
}
