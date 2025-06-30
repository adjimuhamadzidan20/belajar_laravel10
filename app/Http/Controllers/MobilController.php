<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Mobil;

class MobilController extends Controller
{
    // menampilkan data
    public function mobil(Request $request)
    {
        $data = new Mobil();
        $cariData = $request->get('cari');

        // pencarian data
        if ($cariData) {
            $data = $data->where('type_mobil', 'LIKE', '%' . $cariData . '%')
                ->orWhere('tahun_pembelian', 'LIKE', '%' . $cariData . '%');
        }

        $mobil = $data->get();
        return view('mobil', compact('mobil', 'request'));
    }

    // halaman menambah data
    public function create()
    {
        return view('create_mobil');
    }
    // proses menambah data
    public function store(Request $request)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'tipe' => 'required',
            'tahun' => 'required',
            'harga' => 'required',
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        // input data
        $data['user_id'] = auth()->user()->id;
        $data['type_mobil'] = $request->tipe;
        $data['tahun_pembelian'] = $request->tahun;
        $data['harga_mobil'] = $request->harga;
        Mobil::create($data);

        return redirect()->route('admin.mobil')->with('success', 'Data berhasil ditambahkan!');
    }

    // halaman merubah data
    public function edit($id)
    {
        $data = Mobil::find($id);
        return view('edit_mobil', ['mobil' => $data]);
    }
    // proses merubah data
    public function update(Request $request, $id)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'tipe' => 'required',
            'tahun' => 'required',
            'harga' => 'required',
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        // input data 
        $data['user_id'] = auth()->user()->id;
        $data['type_mobil'] = $request->tipe;
        $data['tahun_pembelian'] = $request->tahun;
        $data['harga_mobil'] = $request->harga;

        Mobil::whereId($id)->update($data);
        return redirect()->route('admin.mobil')->with('success', 'Data berhasil terubah!');
    }

    // proses hapus data
    public function delete($id)
    {
        $data = Mobil::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect()->route('admin.mobil')->with('success', 'Data berhasil terhapus!');
    }
}
