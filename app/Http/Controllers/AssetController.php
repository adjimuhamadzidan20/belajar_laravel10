<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Illuminate\Support\Facades\Validator;

class AssetController extends Controller
{
    public function asset(Request $request)
    {
        $data = new Asset();
        $cariData = $request->get('cari');

        // pencarian data
        if ($cariData) {
            $data = $data->where('nama_asset', 'LIKE', '%' . $cariData . '%');
        }

        $asset = $data->get();
        return view('asset', ['asset' => $asset, 'request' => $request]);
    }

    public function create()
    {
        return view('create_asset');
    }

    public function store(Request $request)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'asset' => 'required',
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        // input data
        $data['nama_asset'] = $request->asset;
        Asset::create($data);

        return redirect()->route('admin.asset')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Asset::find($id);
        return view('edit_asset', ['asset' => $data]);
    }

    public function update(Request $request, $id)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'asset' => 'required',
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        // input data
        $data['nama_asset'] = $request->asset;
        Asset::whereId($id)->update($data);

        return redirect()->route('admin.asset')->with('success', 'Data berhasil terubah!');
    }

    public function delete($id)
    {
        $data = Asset::find($id);
        if ($data) {
            $data->delete();
        }

        return redirect()->route('admin.asset')->with('success', 'Data berhasil terhapus!');
    }
}
