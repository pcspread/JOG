<?php

use Illuminate\Support\Facades\Route;
// Controller読込
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;

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
