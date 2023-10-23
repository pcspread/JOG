<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * view表示
     * ログインページ
     * @param void
     * @return view
     */
    public function indexLogin()
    {
        return view('auth.login');
    }
    
    /**
     * view表示
     * 新規登録ページ
     * @param void
     * @return view
     */
    public function indexRegister()
    {
        return view('auth.register');
    }

    /**
     * view表示
     * 認証メール送信済ページ
     * @param void
     * @return view
     */
    public function indexMail()
    {
        return view('auth.verify_email');
    }

    /**
     * view表示
     * 認証メール再送
     * @param void
     * @return view
     */
    public function resendMail()
    {
        return view('auth.send_email');
    }

    /**
     * view表示
     * 新規登録完了ページ
     * @param void
     * @return view
     */
    public function indexThanks()
    {
        return view('auth.thanks');
    }
}
