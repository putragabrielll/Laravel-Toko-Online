<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use App\User;

use Illuminate\Http\Request;

class profileController extends Controller
{
    // yg di bawah jadi klo mau pesan harus login terlebih dahulu walaupun tau alamat url nya
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = User::where('id', Auth::user()->id)->first();

        return view('user.profile.index', compact('user'));
    }

    public function update(Request $request){

        $this->validate($request, [
            'password'  => 'confirmed',
        ]);
        
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->update();

        alert()->success('User Sukses Diupdate', 'Success');
        return redirect('profile');
        // dd('sudah di sini');
    }
}
