<?php

namespace App\Http\Controllers;
use App\Companies;
use App\Http\Requests\CompanyFolder;
use Illuminate\Http\Request;




class CompanyController extends Controller
{

    public function companies_all()
    {

        // すべてのフォルダを取得する
        $companies = Companies::all();

        return view('company/view', [
            'companies' => $companies,
        ]);
    }


    public function CompaniesCreate()
    {
        $companies = Companies::all();
        return view('companies/create', [
            'companies' => $companies,
        ]);
    }

    public function CompaniesEdit($id)
    {

        $c_data = Companies::find($id);

        return view('companies/edit', [
            'c_data' => $c_data
        ]);
    }

    public function CompaniesSave(CompanyFolder $request)
    {
        $companies = new Companies();
        $companies->name = $request->name;
        $companies->open_years = $request->open_years;
        $companies->save();

        return redirect()->route('companies.index', [
            'id' => $companies->id
        ]);
    }

    public function CompaniesEditSave(CompanyFolder $req) {

        $c_data = Companies::find($req->id);

        $c_data->name = $req->name;
        $c_data->open_years = $req->open_years;
        $c_data->save();

        return redirect()->route('companies.index', [
            'id' => $c_data->id,
        ]);
    }

    public function Companiesdalete($id)
    {
        // Booksテーブルから指定のIDのレコード1件を取得
        $c_data =  Companies::find($id);
        // レコードを削除
        $c_data->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('companies.index');
    }
}
