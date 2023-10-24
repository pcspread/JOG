<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * view表示
     * メインページ
     * @param void
     * @return view
     */
    public function indexShop()
    {
        return view('shop.main');
    }

    /**
     * view表示
     * 求人詳細ページ
     * @param ind $id
     * @return view
     */
    public function showShop($id)
    {
        return view('shop.shop_detail');
    }

    /**
     * view表示
     * 求人詳細修正ページ
     * @param int $id
     * @return view
     */
    public function editShop($id)
    {
        return view('shop.shop_edit');
    }
}
