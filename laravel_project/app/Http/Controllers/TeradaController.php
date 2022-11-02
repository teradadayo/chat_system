<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Companies;

class TeradaController extends Controller
{
    //


    public function edit($id) {

        $c_data = Companies::find($id);

        return view('terada/edit', [
            'id' => $id,
            'c_data' => $c_data
        ]);

    }

    public function editSave(Request $req) {

        $c_data = Companies::find($req->id);

        $c_data->name = $req->name;
        $c_data->save();

        return redirect()->route('tera.edit', [
            'id' => $c_data->id,
        ]);

    }
}
