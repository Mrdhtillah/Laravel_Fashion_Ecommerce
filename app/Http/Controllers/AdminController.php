<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $products = DB::select('select * from product');
        return view('admin',['products'=> $products]);
    }

    public function store(Request $request)
    {
        // Add data
        if($request->input('action')=='add'){
          
            // Validasi input
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'product_name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|between:1000, 1000000',
                'quantity' => 'required|numeric|between:1, 1000',
            ]);

            if ($validator->fails()) {
                return redirect('/admin')
                    ->withErrors($validator)
                    ->withInput();
            }

            $product_name = $request -> input('product_name');
            $description = $request -> input('description');
            $price = $request -> input('price');
            $quantity = $request -> input('quantity');
            $images="";



            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $images = 'images/'.$imageName;
            }
            date_default_timezone_set("Asia/Bangkok");
            $create_time = date("Y-m-d H:i:s");
            $data = array(
                'product_name'=>$product_name,
                'description'=>$description,
                'price'=>$price,
                'quantity'=>$quantity,
                'image'=>$images,
                'created_at'=>$create_time,
                'updated_at'=>$create_time);
            DB::table('product')->insert($data);
              return redirect('/admin');
        }
        // Edit data
        else if($request->input('action')=='update'){
          
            // Validasi input
            $validator = Validator::make($request->all(), [
                'edit_id'=> 'required|string|max:255',
                'edit_product_name' => 'required|string|max:255',
                'edit_description' => 'required|string',
                'edit_price' => 'required|numeric|between:1000, 1000000',
                'edit_quantity' => 'required|numeric|between:1, 1000',
            ]);

            if ($validator->fails()) {
                return redirect('/admin')
                    ->withErrors($validator)
                    ->withInput();
            }

            $id = $request -> input('edit_id');
            $product_name = $request -> input('edit_product_name');
            $description = $request -> input('edit_description');
            $price = $request -> input('edit_price');
            $quantity = $request -> input('edit_quantity');
            $images="";


            date_default_timezone_set("Asia/Bangkok");
            $create_time = date("Y-m-d H:i:s");
            if ($request->hasFile('edit_image')) {
                $image = $request->file('edit_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $images = 'images/'.$imageName;
                $data = array(
                    'id'=>$id,
                    'product_name'=>$product_name,
                    'description'=>$description,
                    'price'=>$price,
                    'quantity'=>$quantity,
                    'image'=>$images,
                    'created_at'=>$create_time,
                    'updated_at'=>$create_time);
                DB::table('product')
                ->where('id', $id)
                ->update([  'product_name'=>$product_name,
                            'description'=>$description,
                            'price'=>$price,
                            'quantity'=>$quantity,
                            'image'=>$images,
                            'updated_at'=>$create_time]
                    );
            }
            else{
                
                DB::table('product')
                ->where('id', $id)
                ->update(['product_name'=>$product_name,
                        'description'=>$description,
                        'price'=>$price,
                        'quantity'=>$quantity,
                        'updated_at'=>$create_time]
                    );
                    
            }  
            echo "<script>alert('Data Have Been Updated')</script>";
            session()->put('update', 'True');

            return redirect('/admin');    
        }
        else if($request->input('action')=='delete'){

            $id = $request -> input('edit_id');
            DB::table('product')
                ->where('id', $id)
                ->delete();

            echo "<script>alert('Data Have Been Updated')</script>";
            return redirect('/admin');    
        }
        
    }

}
