<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Guests;
use App\Chats;
use App\user;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Guestsmodel;
use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;




class GuestsController extends Controller
{

    public function Guests_all()
    {

        // $user = Auth::user();
        // if ($id = $user) {
        // Log::debug($user);
        // var_dump($user);
        // exit;
        // すべてのフォルダを取得する
        $guests = Guests::latest()->get();

            return view('guests/view', [
                'guests' => $guests,
            ]);
        }
        // else {
            // return redirect()->route('login');

    public function GuestsCreate()
    {

        $guests = Guests::all();
        // Log::debug($guests);
        return view('guests/create', [
            'guests' => $guests,
        ]);
    }
    public function GuestsEdit($id)
    {


        $g_data = Guests::find($id);
        // var_dump($g_data);
        // exit;
        // Log::debug($g_data);
        if(empty($g_data))
        {
            return redirect()->route('login');
        }


        return view('guests/edit', [
            'g_data' => $g_data
        ]);

    }

    public function GuestsSave(Guestsmodel $request)
    {
        $dir = 'sample';

        $file_name = $request->file('image')->getClientOriginalName();
        // Log::debug($file_name);
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        // Log::debug($request);

        $guests = new Guests();
        $guests->name = $request->name;
        $guests->sex = $request->sex;
        $guests->image = 'storage/' . $dir . '/' . $file_name;
        $result = $guests->save();

        // Log::debug($result);

        return redirect()->route('guests.index', [
            'id' => $guests->id

        ]);
    }

    public function GuestsEditSave(Guestsmodel $req) {

        $dir = 'sample';
        $file_name = $req->file('image')->getClientOriginalName();
        $g_data = Guests::find($req->id);
        // Log::debug($g_data);

        $g_data->name = $req->name;
        $g_data->sex = $req->sex;
        $g_data->image = 'storage/' . $dir . '/' .$file_name;

        $result = $g_data->save();
        // Log::debug($result);
        return redirect()->route('guests.index', [
            'id' => $g_data->id,
        ]);
    }


    public function Guestsdalete(int $id)
    {
        // $c_data =Chats::find($id);
        if(empty($id)){
        return redirect()->route('login');
        }

        // 複数行見つかる SELECT * FROM chats WHERE guest_id = 10;
        $c_datas = Chats::where("guest_id", "=", $id)->get();

        // Log::debug($c_datas);
        //$datas = Chats::where("message", "LIKE", "%あいうえお%")->get();
        //$datas = Chats::where("id", ">=", "5")->get();
        //$datas = Chats::where("id", "=", $id)->get();

        foreach($c_datas as $c_data) {

            //全部ある
            // $c_data->id;
            // $c_data->message;

            $c_data->delete();
            // Log::debug($c_datas);
        }

        // 発言削除処理
        // SELECT * FROM chats WHERE guest_id = 14;
        // $chat = Chats::where($guest);
        // $chat -> delete();
        // 発言データを消したので、あらためてゲスト削除処理
        // 発言データを消したので、あらためてゲスト削除処理
        $g_data =  Guests::find($id);
        // if(empty($id=$c_datas)){
        // return redirect()->route('login');
        // }
        $g_data->delete();
        // Log::debug($g_data);
        return redirect()->route('guests.index');
    }

}
