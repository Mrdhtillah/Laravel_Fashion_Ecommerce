<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;




use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index(){
        return view("admin.login");
    }
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/login')
                ->withErrors($validator)
                ->withInput();
        }

        $email = $request -> input('email');
        $password = $request -> input('password');
        
        $data = array(
            'email'=>$email,
            'password'=>$password);
        $user = DB::select("select * from users where email = '".$data["email"]."' and role = 'admin'");
        if($user==""){
            echo "Email Not Found as Admin.<br/>";
        } 
        else{
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
            {
                session()->put('email', $data['email']);
                return redirect ("/admin");
            }
            else{
                echo "Password incorrect.<br/>";
            }
        }
       
    }
}
