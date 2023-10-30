<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Request読込
use App\Http\Requests\ApplicantRequest;
// DB読込
use Illuminate\Support\Facades\DB;
// Model読込
use App\Models\User;
use App\Models\Applicant;
use App\Models\Job;
// Auth読込
use Illuminate\Support\Facades\Auth;
// Log読込
use Illuminate\Support\Facades\Log;
// Carbon読込
use Carbon\Carbon;

class ApplicantController extends Controller
{
    /**
     * view表示
     * 求人応募ページ
     * @param int $id
     * @return back,view
     */
    public function createApplicant($id)
    {
        // ログインユーザーでない場合
        if (!Auth::check()) {
            return back()->with('danger', '応募にはログインが必要です');
        }
        return view('job.applicant_job', compact('id'));
    }

    /**
     * 応募処理
     * @param int $id
     * @param object $request
     * @return back
     */
    public function storeApplicant($id, ApplicantRequest $request)
    {
        // 既に応募している場合
        if (!empty(Applicant::where('user_id', Auth::id())->where('job_id', $id)->first())) {
            return back()->with('danger', '応募済の求人です');
        }

        // form情報取得
        $form = $request->only(['name', 'email', 'postcode', 'address', 'building', 'gender', 'age', 'tel', 'appeal', 'reason', 'experience', 'question']);
        
        // 画像情報の取得
        $image = $request->file('image');
        
        // 画像ファイルの保存パスを生成
        $path = $image->store('images', 'public');
        
        // create処理:applicants
        Applicant::create([
            'user_id' => Auth::id(),
            'job_id' => $id,
            'name' => $form['name'],
            'email' => $form['email'],
            'image' => $path,
            'postcode' => $form['postcode'],
            'address' => $form['address'],
            'building' => $form['building'],
            'gender' => $form['gender'],
            'age' => $form['age'],
            'tel' => $form['tel'],
            'appeal' => $form['appeal'],
            'reason' => $form['reason'],
            'experience' => $form['experience'],
            'question' => $form['question'],
        ]);

        return back()->with('success', '応募が完了しました');
    } 

    /**
     * view表示
     * 応募結果ページ
     * @param int $id
     * @return back,view
     */
    public function showResult($id)
    {
        // 応募情報の取得
        $applicant = Applicant::where('user_id', Auth::id())->where('job_id', $id)->first();

        // 応募結果が無い場合
        if (is_null($applicant['result'])) {
            return back()->with('danger', '応募結果が未着です');
        }

        // 求人情報の取得
        $job = Job::find($id);

        // 応募情報の取得
        $applicant = Applicant::where('user_id', Auth::id())->where('job_id', $id)->first();

        // 1週間後の日付を格納
        $date = Carbon::parse($applicant['updated_at']);
        $due = $date->addDay(7)->format('Y年m月j日');

        // 結果が決定した日から1週間を超えた場合
        if (Carbon::now()->toDateString() >= $date->addDay(1)->toDateString()) {
            return view('job.failure_message', compact('job'));
        }

        // 応募結果情報の取得
        $result = Applicant::where('user_id', Auth::id())->where('job_id', $id)->first()['result'];
        // 応募結果が通過の場合
        if ($result === 1) {
            return view('job.success_message', compact(['job', 'applicant', 'due']));
        }
        // 応募結果が未通過の場合
        if ($result === 0) {
            return view('job.failure_message', compact('job'));
        }
    }
}
