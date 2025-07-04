<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\Multiplesheet;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ImportController extends Controller
{
    // import excel single sheet
    public function importExcel()
    {
        return view('import_excel.importexcel');
    }

    // import excel multi sheet
    public function importExcelMulti()
    {
        return view('import_excel.importexcelmulti');
    }

    // proses import excel
    public function importProsesSingle(Request $request)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'import' => 'required',
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $fileInput = $request->file('import');
            Excel::import(new UserImport(), $fileInput);

            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function importProsesMulti(Request $request)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'import_multisheet' => 'required',
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        try {
            $fileInputMulti = $request->file('import_multisheet');
            Excel::import(new Multiplesheet(), $fileInputMulti);

            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
