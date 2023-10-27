<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Model読込
use App\Models\Favorite;
// Auth読込
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * お気に入り登録処理
     * @param int $id
     * @return back
     */
    public function storeFavorite($id)
    {
        // お気に入り作成
        Favorite::create([
            'user_id' => Auth::id(),
            'job_id' => $id,
        ]);

        return back()->with('success', 'お気に入りに登録しました');
    }

    /**
     * お気に入り解除処理
     * @param int $id
     * @return back
     */
    public function deleteFavorite($id)
    {
        // delete処理
        Favorite::where('user_id', Auth::id())->where('job_id', $id)->delete();

        return back()->with('success', 'お気に入りから解除しました');
    }
}
