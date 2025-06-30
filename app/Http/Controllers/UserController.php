<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // menampilkan data
    public function user(Request $request)
    {
        $data = new User();
        $cariData = $request->get('cari');

        // pencarian data
        if ($cariData) {
            $data = $data->where('name', 'LIKE', '%' . $cariData . '%')
                ->orWhere('email', 'LIKE', '%' . $cariData . '%');
        }

        $users = $data->withTrashed();
        $users = $data->get();
        return view('user', compact('users', 'request'));
    }

    // halaman menambah data
    public function create()
    {
        return view('create_user');
    }
    // proses menambah data
    public function store(Request $request)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'profil' => 'required|mimes:png,jpg,jpeg|max:2048',
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        // upload gambar file
        $fileProfil = $request->file('profil');
        $fileNama = date('Y-m-d') . $fileProfil->getClientOriginalName();
        $filePath = 'profil_foto/' . $fileNama;

        Storage::disk('public')->put($filePath, file_get_contents($fileProfil));

        // input data user
        $data['name'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $fileNama;
        User::create($data);

        return redirect()->route('admin.user')->with('success', 'User berhasil ditambahkan!');
    }

    // halaman merubah data
    public function edit($id)
    {
        $data = User::find($id);
        return view('edit_user', ['user' => $data]);
    }
    // proses merubah data
    public function update(Request $request, $id)
    {
        // validasi inputan
        $validasi = Validator::make($request->all(), [
            'profil' => 'mimes:png,jpg,jpeg|max:2048',
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'nullable'
        ]);

        // jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        // upload gambar file
        $fileProfil = $request->file('profil');
        $fileProfilLama = $request->profil_lama;
        $filePath = 'profil_foto/';

        // cek input file
        if ($fileProfil) {
            // hapus file lama
            if ($fileProfilLama) {
                Storage::disk('public')->delete($filePath . $fileProfilLama);
            }

            $fileNama = date('Y-m-d') . $fileProfil->getClientOriginalName();
            Storage::disk('public')->put($filePath . $fileNama, file_get_contents($fileProfil));
            $data['image'] = $fileNama;
        } else {
            $data['image'] = $fileProfilLama;
        }

        // input data user
        $data['name'] = $request->nama;
        $data['email'] = $request->email;

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);
        return redirect()->route('admin.user')->with('success', 'User berhasil terubah!');
    }

    // proses hapus data
    public function delete($id)
    {
        $data = User::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect()->route('admin.user')->with('success', 'User berhasil terhapus!');
    }

    // detail data
    public function detail($id)
    {
        $data = User::find($id);
        return view('detail_user', ['user' => $data]);
    }
}
