<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Contracts\DataTable;

class DatatableController extends Controller
{
    // show data versi clientside
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

    // show data versi serverside
    public function serverSide(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users');
            $cariData = $request->filled('nama');

            // pencarian data
            if ($cariData) {
                $data = $data->where('name', 'LIKE', '%' . $request->nama . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->nama . '%');
            }

            $data = $data->orderBy('id', 'asc');

            return DataTables::of($data)
                ->addColumn('no', function ($data) {
                    return $data->id;
                })
                ->addColumn('nama', function ($data) {
                    return $data->name;
                })
                ->addColumn('email', function ($data) {
                    return $data->email;
                })
                ->addColumn('opsi', function ($data) {
                    return '
                    <div class="text-center">
                        <a href="' . route('admin.user.edit', ['id' => $data->id]) . '" class="btn btn-primary btn-sm">Edit</a>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default' . $data->id . '">Delete</button>
                    </div>

                    <div class="modal fade" id="modal-default' . $data->id . '">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Hapus Data User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Anda yakin ingin menghapus ' . $data->name . '?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <a href="' . route('admin.user.delete', ['id' => $data->id]) . '" class="btn btn-dark">Delete</a>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                    </div>';
                })->rawColumns(['opsi'])->toJson();
        }

        return view('datatable.serverside', compact('request'));
    }
}
