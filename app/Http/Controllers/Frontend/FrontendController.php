<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Category; 
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('frontend.index', compact('sliders'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('frontend.collections.category.index', compact('categories'));
    }  
    
    public function products($category_id)
    {
        $category = Category::find($category_id);
    
        if ($category) {
            $products = $category->products; 
            return view('frontend.collections.products.index', compact('products', 'category'));
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }    
}

