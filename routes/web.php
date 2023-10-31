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
Route::get('/login', [UserController::class, 'indexLogin'])->name('login');

// ログイン処理
Route::post('/login', [UserController::class, 'login']);

// view表示：認証メール送信済ページ
Route::get('/verify/email', [UserController::class, 'indexMail']);

// 認証メール再送
Route::get('/resend/email', [UserController::class, 'resendMail']);

// view表示：新規登録完了ページ
Route::get('/thanks', [UserController::class, 'indexThanks']);

// view表示：トップページ
Route::get('/', [JobController::class, 'indexTop']);

// view表示：求人一覧ページ
Route::get('/jobs', [JobController::class, 'indexJobs']);

// 求人検索処理
Route::post('/jobs', [JobController::class, 'searchJobs']);

// 求人検索リセット処理
Route::get('/jobs/reset', [JobController::class, 'searchReset']);

Route::prefix('/job')->group(function() {
    
    // view表示：求人詳細ページ
    Route::get('/detail/{id}', [JobController::class, 'showJob']);

    // お気に入り登録処理
    Route::post('/favorite/{id}', [FavoriteController::class, 'storeFavorite']);
    
    // お気に入り登録解除処理
    Route::delete('/favorite/{id}', [FavoriteController::class, 'deleteFavorite']);
    
    // view表示：求人応募ページ
    Route::get('/send/{id}', [ApplicantController::class, 'createApplicant']);
    
    // 応募処理
    Route::post('/send/{id}', [ApplicantController::class, 'storeApplicant']);
    
    // view表示：応募結果ページ
    Route::get('/result/{id}', [ApplicantController::class, 'showResult'])->middleware(['auth', 'verified']);
});

// view表示：マイページ
Route::get('/mypage', [JobController::class, 'indexMypage']);

// view表示：メインページ
Route::get('/company', [CompanyController::class, 'indexCompany']);

Route::middleware(['auth', 'verified'])->group(function() {
    Route::prefix('/company')->group(function() {
        // view表示：求人詳細ページ(店舗側)
        Route::get('/detail/{id}', [CompanyController::class, 'showCompany']);
        
        // view表示：求人詳細修正ページ
        Route::get('/detail/{id}/edit', [CompanyController::class, 'editCompany']);
        
        // 求人詳細更新処理
        Route::post('/detail/{id}/edit', [CompanyController::class, 'updateCompany']);
        
        // view表示：求人作成ページ
        Route::get('/create', [CompanyController::class, 'createJob']);
        
        // 求人作成処理
        Route::post('/create', [CompanyController::class, 'storeJob']);
        
        // view表示：応募詳細ページ
        Route::get('/list/{id}', [CompanyController::class, 'showApplicant']);
        
        // 応募結果送信処理
        Route::post('/list/{id}', [CompanyController::class, 'updateApplicant']);
        
        // 質問返答処理
        Route::patch('/list/{id}', [CompanyController::class, 'updateQuestion']);
    });

    // ログアウト処理
    Route::get('/logout', [UserController::class, 'logout']);
});