<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateFolder; // ★ 追加
use Illuminate\Http\Request;
use App\Folder;





class FolderController extends Controller

{
    public function create(CreateFolder $request) // ★ 引数の型を変更
{

    // フォルダモデルのインスタンスを作成する
    $folder = new Folder();
    // タイトルに入力値を代入する
    $folder->title = $request->title;
    // インスタンスの状態をデータベースに書き込む
    Auth::user()->folders()->save($folder);
    $folder->save();
    return redirect()->route('tasks.index', [
        'id' => $folder->id,
    ]);
}
    public function showCreateForm()
    {
        return view('folders/create');
    }
}
