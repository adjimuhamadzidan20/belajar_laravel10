<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ktp;
use Illuminate\Support\Facades\Validator;

class KtpController extends Controller
{
    public function ktp(Request $request)
    {
        $data = new Ktp();
        $cariData = $request->get('cari');

        // pencarian data
        if ($cariData) {
            $data = $data->where('nik', 'LIKE', '%' . $cariData . '%');
        }

        $ktp = $data->get();
        return view('ktp', ['ktp' => $ktp, 'request' => $request]);
    }

    public function create()
    {
        return view('create_ktp');
    }

    public function store(Request $request)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'nik' => 'required',
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        // input data
        $data['user_id'] = auth()->user()->id;
        $data['nik'] = $request->nik;
        Ktp::create($data);

        return redirect()->route('admin.ktp')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Ktp::find($id);
        return view('edit_ktp', ['ktp' => $data]);
    }

    public function update(Request $request, $id)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'nik' => 'required',
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        // input data
        $data['user_id'] = auth()->user()->id;
        $data['nik'] = $request->nik;
        Ktp::whereId($id)->update($data);

        return redirect()->route('admin.ktp')->with('success', 'Data berhasil terubah!');
    }

    public function delete($id)
    {
        $data = Ktp::find($id);
        if ($data) {
            $data->delete();
        }

        return redirect()->route('admin.ktp')->with('success', 'Data berhasil terhapus!');
    }
}
