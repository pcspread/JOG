<?php

use Illuminate\Support\Facades\Route;
// Controller読込
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ShopController;

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

// view表示：ログインページ
Route::get('/login', [UserController::class, 'indexLogin']);

// view表示：新規登録ページ
Route::get('/register', [UserController::class, 'indexRegister']);

// view表示：認証メール送信済ページ
Route::get('/verify/email', [UserController::class, 'indexMail']);

// view表示：
Route::get('/resend/email', [UserController::class, 'resendMail']);

// view表示：新規登録完了ページ
Route::get('/thanks', [UserController::class, 'indexThanks']);

// view表示：トップページ
Route::get('/', [JobController::class, 'indexTop']);

// view表示：求人一覧ページ
Route::get('/jobs', [JobController::class, 'indexJobs']);

// view表示：求人詳細ページ
Route::get('/job/detail/{id}', [JobController::class, 'showJob']);

// view表示：求人応募ページ
Route::get('/job/send', [ApplicantController::class, 'createApplicant']);

// view表示：応募結果ページ
Route::get('/job/result', [ApplicantController::class, 'showResult']);

// view表示：マイページ
Route::get('/mypage', [JobController::class, 'indexMypage']);

// view表示：メインページ
Route::get('/shop', [ShopController::class, 'indexShop']);

// view表示：求人詳細ページ(店舗側)
Route::get('/shop/detail/{id}', [ShopController::class, 'showShop']);

// view表示：求人詳細修正ページ
Route::get('/shop/detail/{id}/edit', [ShopController::class, 'editShop']);