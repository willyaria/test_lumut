<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator_m;

class Administrator extends Controller
{
    public function index(Request $request)
    {
        $id_user = $request->session()->get('id_User');
        $user = Administrator_m::select('id', 'name', 'role')
                ->where('id', $id_user)
                ->get();

        return view('vb_administrator/main_dashboard', compact('id_user', 'user'));
    }

    public function dashboard(Request $request)
    {
        $id_user = $request->session()->get('id_User');
        $all_session = $request->session()->get('userdata');

        return view('vb_administrator/dashboard_utama', compact('id_user', 'all_session'));
        
    }
}
