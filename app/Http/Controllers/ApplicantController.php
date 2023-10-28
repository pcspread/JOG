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
// Auth読込
use Illuminate\Support\Facades\Auth;
// Log読込
use Illuminate\Support\Facades\Log;

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
        $formUser = $request->only(['name', 'postcode', 'address', 'building', 'gender', 'age', 'tel']);
        $formApplicant = $request->only(['appeal', 'reason', 'experience', 'question']);

        // 画像情報の取得
        $image = $request->file('image');

        // 画像ファイルの保存パスを生成
        $path = $image->store('images', 'public');
        
        // トランザクション開始
        DB::beginTransaction();

        try {
            // update処理:users
            User::find(Auth::id())->update([
                'name' => $formUser['name'],
                'image' => $path,
                'postcode' => $formUser['postcode'],
                'address' => $formUser['address'],
                'building' => $formUser['building'],
                'gender' => $formUser['gender'],
                'age' => $formUser['age'],
                'tel' => $formUser['tel'],
            ]);

            // create処理:applicants
            Applicant::create([
                'user_id' => Auth::id(),
                'job_id' => $id,
                'appeal' => $formApplicant['appeal'],
                'reason' => $formApplicant['reason'],
                'experience' => $formApplicant['experience'],
                'question' => $formApplicant['question'],
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
        if (empty($applicant['result'])) {
            return back()->with('danger', '応募結果が未着です');
        }

        return view('job.success_message');
    }
}
