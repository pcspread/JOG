<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * view表示
     * 求人応募ページ
     * @param void
     * @return view
     */
    public function createApplicant()
    {
        return view('job.applicant_job');
    }

    /**
     * view表示
     * 応募結果ページ
     * @param void
     * @return view
     */
    public function showResult()
    {
        return view('job.success_message');
    }
}
