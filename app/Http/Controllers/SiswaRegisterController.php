<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class SiswaRegisterController extends Controller
{

    public function index(){
        return view('siswa_register');
    }

    public function register(Request $request){
        $this->validate($request,
            [
                'nama_siswa' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:1'],
            ]);

        try {
            $user = User::create([
                'nama' => $request->nama_siswa,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'roles' => 'siswa',
            ]);
            return redirect()->route('login');
        }catch(\Exception $e){
            return redirect()->back()->withInput($request->only('nama_siswa', 'email'));
        }

    }
}
