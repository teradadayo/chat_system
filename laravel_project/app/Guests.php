<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{

        protected $guarded = ['id'];

        public static $rules = [
            'name' => 'required|max: 30',
            'year' => 'required',
            'sex'  => 'required',
            'shot' => 'required|max: 50',
            'messege' => 'required|max: 1000',
            'image' => 'required',
        ];
        public function getSexTextAttribute()
    {
       switch($this->attributes['sex']) {
           case 1:
               return '男';
           case 2;
               return '女';
           default:
               return '??';
       }

    }
}
