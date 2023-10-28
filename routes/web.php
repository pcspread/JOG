<?php

use Illuminate\Support\Facades\Route;
// Controller読込
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FavoriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// view表示：新規登録ページ
Route::get('/register', [UserController::class, 'indexRegister']);

// 新規登録処理
Route::post('/register', [UserController::class, 'register']);

// view表示：ログインページ
Route::get('/login', [UserController::class, 'indexLogin']);

// ログイン処理
Route::post('/login', [UserController::class, 'login']);

// view表示：認証メール送信済ページ
Route::get('/verify/email', [UserController::class, 'indexMail']);

// view表示：
Route::get('/resend/email', [UserController::class, 'resendMail']);

// view表示：新規登録完了ページ
Route::get('/thanks', [UserController::class, 'indexThanks']);

// ログアウト処理
Route::get('/logout', [UserController::class, 'logout']);

// view表示：トップページ
Route::get('/', [JobController::class, 'indexTop']);

// view表示：求人一覧ページ
Route::get('/jobs', [JobController::class, 'indexJobs']);

// 求人検索処理
Route::post('/jobs', [JobController::class, 'searchJobs']);

// 求人検索リセット処理
Route::get('/jobs/reset', [JobController::class, 'searchReset']);

// お気に入り登録処理
Route::post('/job/favorite/{id}', [FavoriteController::class, 'storeFavorite']);

// お気に入り登録解除処理
Route::delete('/job/favorite/{id}', [FavoriteController::class, 'deleteFavorite']);

// view表示：求人詳細ページ
Route::get('/job/detail/{id}', [JobController::class, 'showJob']);

// view表示：求人応募ページ
Route::get('/job/send/{id}', [ApplicantController::class, 'createApplicant']);

// 応募処理
Route::post('/job/send/{id}', [ApplicantController::class, 'storeApplicant']);

// view表示：応募結果ページ
Route::get('/job/result/{id}', [ApplicantController::class, 'showResult']);

// view表示：マイページ
Route::get('/mypage', [JobController::class, 'indexMypage']);

// view表示：メインページ
Route::get('/company', [CompanyController::class, 'indexCompany']);

// view表示：求人詳細ページ(店舗側)
Route::get('/company/detail/{id}', [CompanyController::class, 'showCompany']);

// view表示：求人詳細修正ページ
Route::get('/company/detail/{id}/edit', [CompanyController::class, 'editCompany']);

// view表示：求人作成ページ
Route::get('/company/create', [CompanyController::class, 'createJob']);

// view表示：応募詳細ページ
Route::get('/company/list/{id}', [CompanyController::class, 'showApplicant']);