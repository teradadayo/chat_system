<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // ログインユーザーを取得する
        $user = Auth::user();
        // Log::debug($user);
        // ログインユーザーに紐づくフォルダを一つ取得する
        $user_data = $user->first();
        // Log::debug($user_data);
        // まだ一つもフォルダを作っていなければホームページをレスポンスする
        if (is_null($user_data)) {
            return view('home');
            // Log::debug($folder);
        }

        // フォルダがあればそのフォルダのタスク一覧にリダイレクトする
        return redirect()->route('guests.index');

    }
}
