<?php

namespace App\Http\Controllers;

class BerandaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['permission:view_dashboard']);
    // }

    public function dashboard()
    {
        // if (auth()->user()->can('view_dashboard')) {
        //     return view('dashboard');
        // }
        return view('dashboard');

        // return abort(403);
    }
}
