<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatatableController extends Controller
{
    public function clientSide(Request $request)
    {
        $data = DB::table('users');
        $cariData = $request->get('cari');

        // pencarian data
        if ($cariData) {
            $data = $data->where('name', 'LIKE', '%' . $cariData . '%')
                ->orWhere('email', 'LIKE', '%' . $cariData . '%');
        }

        $users = $data->get();
        return view('datatable.client', compact('users', 'request'));
    }

    public function serverSide(Request $request)
    {
        $data = DB::table('users');
        $cariData = $request->get('cari');

        // pencarian data
        if ($cariData) {
            $data = $data->where('name', 'LIKE', '%' . $cariData . '%')
                ->orWhere('email', 'LIKE', '%' . $cariData . '%');
        }

        $users = $data->get();
        return view('user', compact('users', 'request'));
    }
}
