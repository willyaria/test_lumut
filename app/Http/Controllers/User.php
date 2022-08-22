<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_m;
use DB;

class User extends Controller
{
    public function index(Request $request)
    {
        $idf = $request->session()->get('id_User_Website_Pondok');

        if (request()->ajax()) {

            $get_datatables_user = User_m::orderBy('id', 'desc');
            // ->get();

            return datatables()->of($get_datatables_user)
                ->addColumn('action', function ($field) {

                    $button = '<button type="button" title="Edit" name="edit" id="' . $field->id . '" class="edit btn btn-primary btn-sm"><i class="fa fa-pencil-square"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" title="Delete" name="delete" id="' . $field->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->make(true);
        }

        $id_user = $request->session()->get('id_User');

        return view('vb_user/daftar', compact('id_user'));
    
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function tambah_user(Request $request)
    {
        $id_user = $request->session()->get('id_User');

        return view('vb_user/add', compact('id_user'));
    }

    public function save_user(Request $request)
    {
        $passcrypt = $this->hash_password($request->get('pass'));

        $data1 = array(
            'name' => $request->get('nm'),
            'username' => $request->get('usr'),
            'role' => $request->get('rol'),
            'password' => $passcrypt,
        );
        User_m::insert($data1);

        $idg = DB::select('SELECT MAX(id) AS max_id FROM account');
        foreach ($idg as $dt1) {
            $idf = $dt1->max_id;
        }

        $data2 = array(
            'id' => $idf,
            'password' => $request->get('pass'),
            'username' => $request->get('usr'),
        );
        DB::table('account_password')->insert($data2);
    }

    public function ubah_user(Request $request, $id)
    {
        $user_edit = User_m::select('*')
            ->where('id', $id)
            ->get();
        $id_user = $request->session()->get('id_User');

        return view('vb_user/edit', compact('user_edit', 'id_user'));
    }

    public function update_user(Request $request)
    {
        $passcrypt = $this->hash_password($request->get('pass'));
        $id = $request->get('id');

        $data2 = array(
            'name' => $request->get('nm'),
            'username' => $request->get('usr'),
            'role' => $request->get('rol'),
            'password' => $passcrypt,
        );
        User_m::where('id', $id)->update($data2);
    }

    public function delete_user($id)
    {
        User_m::where('id', $id)->delete();
    }

}
