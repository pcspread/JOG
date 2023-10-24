<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('job.top');
    }

    /**
     * view表示
     * 求人一覧ページ
     * @param void
     * @return view
     */
    public function indexJobs()
    {
        return view('job.jobs');
    }

    /**
     * view表示
     * 求人詳細ページ
     * @param int $id
     * @return view
     */
    public function showJob($id)
    {
        return view('job.job_detail');
    }

    /**
     * view表示
     * マイページ
     * @param void
     * @return view
     */
    public function indexMypage()
    {
        return view('job.mypage');
    }
}
