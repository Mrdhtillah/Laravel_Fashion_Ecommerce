<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    public function index(){
        $users = DB::select("select * from users where role='customer'");
        return view('customer',['users'=> $users]);
    }

    public function block(Request $request)
    {
         //block user
        $email = $request -> input('email');
        DB::table('product')
            ->where('email', $email)
            ->update([  'status'=>'0']
                    );

        echo "<script>alert('Data Have Been Updated')</script>";
        return redirect('/customer');      
    }
}
