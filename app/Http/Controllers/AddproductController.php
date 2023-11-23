<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
class AddproductController extends Controller
{
    public function index()
    {
        return view('/addproduct');
    }
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|between:1000, 1000000',
            'quantity' => 'required|numeric|between:1, 1000',
        ]);

        if ($validator->fails()) {
            return redirect('/addproduct')
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
            // $imageName = time().'.'.$request->gambar->extension();
            // session()->flash('image', $imageName);
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
        echo "Record inserted successfully.<br/>";
    }
}
