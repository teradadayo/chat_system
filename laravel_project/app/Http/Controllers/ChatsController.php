<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Companies;
use App\ChatsFolder;
use App\Guests;
use App\Chats;
use App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\TestMail;
use App\Http\Requests\CompanyFolder;
use Illuminate\Http\Request;

class ChatsController extends Controller
{


    public function chats_all($guest_id)
    {

        // $chat = Chats::findByChoiceSelectJoinGuestsAll(
        //     'guests.name',
        //     'chats.guest_id',
        //     'chats.message',
        //     'chats.created_at',
        // );

        $chat = Chats::select(
            'guests.name',
            'chats.guest_id',
            'chats.message',
            'chats.created_at',
        )

        ->leftjoin('guests','guests.id','=','chats.guest_id')
        ->latest()
        ->get();

        // Log::debug($chat);


        return view('chats/index', [
            'chats' => $chat,
            'guest_id' => $guest_id
        ]);

    }

    public function ChatsCreate(Request $req)
    {
        // Log::debug($req);

        $id = $req->id;
        $mes = $req->message;

        $chat = new Chats();
        $chat->message = $req->message;
        $chat->guest_id = $id;
        $result = $chat->save();
        $name = 'テスト ユーザー';
        $email = 'test@example.com';

        Mail::send(new TestMail($name, $email));
        if(empty($chat))
        {
            return redirect()->route('login');
        }

        // var_dump($chat);
        // exit;
        // Log::debug($chat);





        return redirect()->route('chats.index', [
            'guest_id' => $chat->guest_id

        ]);
    }
}
