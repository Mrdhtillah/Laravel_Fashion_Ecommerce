<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set("Asia/Bangkok");
        $create_time = date("Y-m-d H:i:s");
        Product::create([
            'product_name'=>'Jacket',
            'description'=>'Blabla',
            'price'=>'120000',
            'quantity'=>'20',
            'image'=>'images/1700202897.jpeg',
            'created_at'=>$create_time,
            'updated_at'=>$create_time
        ]);
    }
}
