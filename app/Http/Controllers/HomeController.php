<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\ProductCategory;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $data['products'] = Products::all();
        return view('home', $data);
    }

    public function product($id)
    {
        $data['products'] = Products::find($id);
        $data['related'] = Products::all();
        return view('detail', $data);
    }

    public function category(Request $request)
    {
        $data['categories'] = ProductCategory::all();
        $category = $request->category_id;
        
        $price_min = preg_replace('/[^0-9]/','',$request->input('price_min', null));
        $price_max = preg_replace('/[^0-9]/','',$request->input('price_max', null));

        if($category != null) {
            if($price_min != null && $price_max != null) {
                $data['products'] = Products::where('product_category_id', $category)->whereBetween('price', [$price_min, $price_max])->get();    
            }
            $data['products'] = Products::where('product_category_id', $category)->get();
        } else {
            return redirect()->route('home');
        }
        
        return view('category', $data);
    }
}
