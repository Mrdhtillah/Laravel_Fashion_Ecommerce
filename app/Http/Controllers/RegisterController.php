<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class RegisterController extends Controller
{
    public function index(){
        return view("admin.register");
    }
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'confirmpass' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/register')
                ->withErrors($validator)
                ->withInput();
        }
        $name = $request -> input('name');
        $email = $request -> input('email');
        $password = $request -> input('password');
        $confirmpass = $request -> input('confirmpass');


        
        $data = array(
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'confirmpass'=>$confirmpass
        );
        if($data['password']==$data['confirmpass']){
            $data = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role'=>'admin');
            DB::table('users')->insert($data);
            
            return redirect("/admin/login");
        }
        else{
            echo "password not same.<br/>";
        }
       
    }
}
