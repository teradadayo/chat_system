<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function guests()
    {
        return $this->hasMany('App\Guests');
    }
}
