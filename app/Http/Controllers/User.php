<?php

namespace App\Http\Controllers;

use App\Models\User as UserModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function index(){
        $data['user'] = UserModel::all();
        $data['title'] = 'Daftar User';
        return view('user_index', $data);
    }
    public function store(Request $req):RedirectResponse {
        $req->validate([
            'nama' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|unique:users,email|max:255',
            'password' => 'required|min:4',
        ]);

        try {
            $user = new UserModel();
            $user->nama = $req->nama;
            $user->username = $req->username;
            $user->password = Hash::make($req->password);
            $user->email = $req->email;
            $user->save();
    
            return redirect(route('user'))->with('alert', 'Berhasil menambahkan user');
        } catch (\Throwable $th) {
            return redirect(route('user'))->withErrors($th->getMessage());
        }
    }
    public function edit(Request $req):RedirectResponse {
        $req->validate([
            'nama' => 'required|max:255',
            'id' => 'required|exists:users,id',
            'username' => 'required|max:255|unique:users,username,'.$req->id.',id',
            'email' => 'required|unique:users,email,'.$req->id.',id|max:255',
        ]);

        try {
            $user = UserModel::find($req->id);
            $user->nama = $req->nama;
            $user->username = $req->username;
            $user->email = $req->email;
            $user->save();
    
            return redirect(route('user'))->with('alert', 'Berhasil mengedit user');
        } catch (\Throwable $th) {
            return redirect(route('user'))->withErrors($th->getMessage());
        }
    }
    public function hapus($id = null){
        $user = UserModel::find($id);
        abort_if($user == null, 404);

        try {
            UserModel::destroy($id);
            return redirect(route('user'))->with('alert', 'Berhasil menghapus user');
        } catch (\Throwable $th) {
            return redirect(route('user'))->withErrors($th->getMessage());
        }
    }
    public function reset(Request $req){
        $req->validate([
            'id' => 'required',
            'password_lama' => 'required',
            'password_baru' => 'required',
            'password_konfirmasi' => 'required',
        ]);

        $user = UserModel::find(auth()->id());
        if(!Hash::check($req->password_lama, $user->password)){
            return redirect()->back()->withErrors('Password Lama Salah!')->withInput();
        }
        if($req->password_baru != $req->password_konfirmasi){
            return redirect()->back()->withErrors('Konfirmasi Ulang Password Baru')->withInput();
        }

        $user->password = Hash::make($req->password_baru);
        $user->save();

        return redirect(route('home'))->with('alert', 'Berhasil mereset password');
    }
    public function login(Request $req){
        $cred = $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($cred)){
            $req->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return redirect(route('login'))->withErrors('Login Failed')->withInput();
    }
    public function logout(Request $req){
        Auth::logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/');
    }
}
