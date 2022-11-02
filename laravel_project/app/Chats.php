<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'message' => 'required'
    ];
    public function message()
   {
       return $this->hasOne(Chats::class);
   }


   public function findByChoiceSelectJoinGuestsAll($select_columns = array()) {

       $datas = Chats::select(

           $select_columns
       )

       ->leftjoin('guests','guests.id','=','chats.guest_id')
       ->latest()
       ->get();

       return $datas;
   }

}
