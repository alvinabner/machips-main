<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        // dd(Auth::guard('user')->check());
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $input = $request->all();
        unset($input['_token']);
        
        if(Auth::guard('user')->attempt($input)) {
            return redirect()->route('category.product');
        }else{
            return redirect()->back()->with('success', 'Login Gagal Periksa Email dan Password anda!!');
        }    
    }

    public function create()
    {
        return view('auth.registrasi');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'username' => 'required',
        //     'email' => 'required|min:13',
        //     'password' => 'required|min:6|same:password_confirmation',
        //     'password_confirmation' => 'required|min:6'
        // ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->nama;
        $user->ttl = $request->ttl;
        $user->alamat = $request->alamat;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect()->route('auth.index')->with('success', 'Daftar Akun Success!!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('profile.index', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->nama;
        $user->ttl = $request->ttl;
        $user->alamat = $request->alamat;
        $user->phone = $request->phone;
        $password = $request->get('password');
        if ($password) {
            $user->password = Hash::make($password);
        }
        $user->save();

        return redirect()->back()->with('success', 'Update Akun Success!!');
    }

    public function logout()
    {
        $user = Auth::guard('user');
        $user->logout();

        return redirect()->route('auth.index');
    }
}
