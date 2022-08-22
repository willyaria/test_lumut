<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\Auth_m;

class Auth extends Controller
{
    public function index()
    {
        return view('vb_auth/auth_login_center');
    }

    public function loginx(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $usser = Auth_m::select('username', 'password')
            ->where('username', $username)
            ->get();

        foreach ($usser as $dt) {
            $pass = $dt->password;
            $user = $dt->username;
        }

        //apakah username tersebut ada atau tidak
        if ($usser) {
            if (Hash::check($password, $pass)) {
                $user_id = Auth_m::select('id')
                    ->where('username', $username)
                    ->get();

                foreach ($user_id as $dt) {
                    $userId = $dt->id;
                }

                $user = Auth_m::select('id', 'username', 'name', 'role')
                    ->where('id', $userId)
                    ->get();

                // var_dump($user);die;
                foreach ($user as $dt) {
                    $id = $dt->id;
                    $username = $dt->username;
                    $nama= $dt->name;
                    $peran = $dt->role;
                }

                $sess_data = array(
                    Session::put('id_User', $id),
                    Session::put('nama', $nama),
                    Session::put('peran', $peran),
                    Session::put('userName', $username),
                );

                Session::put('userdata', $sess_data);

                return redirect('admin');
                
            } else {
                return redirect('/')->with('alert', 'Password, Salah !');
            }
        } else {
            return redirect('/')->with('alert', 'Username, Salah!');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->invalidate();
        return redirect('/');
    }
}
