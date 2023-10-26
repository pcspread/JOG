<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('company.main');
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