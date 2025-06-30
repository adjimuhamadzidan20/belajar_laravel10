<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Rumah;

class RumahController extends Controller
{
    // menampilkan data
    public function rumah(Request $request)
    {
        $data = new Rumah();
        $cariData = $request->get('cari');

        // pencarian data
        if ($cariData) {
            $data = $data->where('type_rumah', 'LIKE', '%' . $cariData . '%')
                ->orWhere('lokasi_rumah', 'LIKE', '%' . $cariData . '%');
        }

        $rumah = $data->get();
        return view('rumah', compact('rumah', 'request'));
    }

    // halaman menambah data
    public function create()
    {
        return view('create_rumah');
    }
    // proses menambah data
    public function store(Request $request)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'tipe' => 'required',
            'harga' => 'required',
            'lokasi' => 'required',
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        // input data
        $data['user_id'] = auth()->user()->id;
        $data['type_rumah'] = $request->tipe;
        $data['harga_rumah'] = $request->harga;
        $data['lokasi_rumah'] = $request->lokasi;
        Rumah::create($data);

        return redirect()->route('admin.rumah')->with('success', 'Data berhasil ditambahkan!');
    }

    // halaman merubah data
    public function edit($id)
    {
        $data = Rumah::find($id);
        return view('edit_rumah', ['rumah' => $data]);
    }
    // proses merubah data
    public function update(Request $request, $id)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'tipe' => 'required',
            'harga' => 'required',
            'lokasi' => 'required',
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        // input data 
        $data['user_id'] = auth()->user()->id;
        $data['type_rumah'] = $request->tipe;
        $data['harga_rumah'] = $request->harga;
        $data['lokasi_rumah'] = $request->lokasi;

        Rumah::whereId($id)->update($data);
        return redirect()->route('admin.rumah')->with('success', 'Data berhasil terubah!');
    }

    // proses hapus data
    public function delete($id)
    {
        $data = Rumah::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect()->route('admin.rumah')->with('success', 'Data berhasil terhapus!');
    }
}
