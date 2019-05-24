<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Users;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth');
    }

    public function login(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = Users::where('email',$email)->first();
        if($data){
            if(Hash::check($password,$data->password)){
                Session::put('id', $data->id);
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                Session::put('level', $data->level);
                Session::put('login', TRUE);
                return redirect()->route('home');
            }
            else{
                return redirect('auth')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('auth')->with('alert','Password atau Email, Salah!');
        }
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email',
            'password' => 'required'
        ]);

        $data = new Users();
        $data->name = $request->name;
        $data->email = $request->email;        
        $data->password = bcrypt($request->password);
        $data->level = 0;
        $data->save();

        return redirect('auth')->with('alert-success','Kamu berhasil Register');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('home');
    }
}
