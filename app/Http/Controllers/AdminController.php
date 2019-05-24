<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\ProductCategory;
use App\Orders;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function products()
    {
        if(Session::get('level') == 1) {
            $data['products'] = Products::all();
            return view('products', $data);            
        } else {
            return redirect()->route('dashboard');
        }        
    }

    public function addProducts()
    {
        if(Session::get('level') == 1) {
            $data['data'] = [];
            $data['mode'] = 'create';
            $data['category'] = ProductCategory::all();
            return view('products-form', $data);
        } else {
            return redirect()->route('dashboard');
        } 
    }

    public function storeProducts(Request $request)
    {
        if(Session::get('level') == 1) {
            $this->validate($request, [
                'name' => 'min:4|required',
                'product_category_id' => 'required',
                'description' => 'required',
                'price' => 'numeric|required',
                'qty' => 'numeric|required',
                'image' => 'image|required',
            ]);

            $file = $request->file('image');

            $product = new Products;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->image = 'product/'.$file->getClientOriginalName();
            $product->slug = Str::slug($request->name, '-');
            $product->product_category_id = $request->product_category_id;
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->save();

            $file->move('product', $file->getClientOriginalName());

            return redirect()->route('products.index');
        } else {
            return redirect()->route('dashboard');
        } 
    }

    public function editProducts($id)
    {
        if(Session::get('level') == 1) {
            $data['data'] = Products::find($id);
            $data['mode'] = 'edit';
            $data['category'] = ProductCategory::all();
            return view('products-form', $data);
        } else {
            return redirect()->route('dashboard');
        } 
    }

    public function updateProducts(Request $request, $id)
    {
        if(Session::get('level') == 1) {
            $this->validate($request, [
                'name' => 'min:4|required',
                'product_category_id' => 'required',
                'description' => 'required',
                'price' => 'numeric|required',
                'qty' => 'numeric|required',
            ]);

            $file = $request->file('image');
            
            $product = Products::find($id);
            $product->name = $request->name;
            $product->description = $request->description;            
            $product->slug = Str::slug($request->name, '-');
            $product->product_category_id = $request->product_category_id;
            $product->price = $request->price;
            $product->qty = $request->qty;

            if($file == null) {
                $product->image = $product->image;
            } else {
                $product->image = 'product/'.$file->getClientOriginalName();
                $file->move('product', $file->getClientOriginalName());
            }

            $product->save();

            return redirect()->route('products.index');
        } else {
            return redirect()->route('dashboard');
        } 
    }

    public function deleteProducts($id)
    {
        if(Session::get('level') == 1) {
            $product = Products::find($id);
            $product->delete();

            return redirect()->route('products.index');
        } else {
            return redirect()->route('dashboard');
        } 
    }

    public function productsCategory()
    {
        if(Session::get('level') == 1) {
            $data['category'] = ProductCategory::all();
            return view('products-category', $data);            
        } else {
            return redirect()->route('dashboard');
        }        
    }

    public function addProductsCategory()
    {
        if(Session::get('level') == 1) {
            $data['data'] = [];
            $data['mode'] = 'create';
            return view('products-category-form', $data);
        } else {
            return redirect()->route('dashboard');
        } 
    }

    public function storeProductsCategory(Request $request)
    {
        if(Session::get('level') == 1) {
            $this->validate($request, [
                'name' => 'min:4|required'
            ]);

            $file = $request->file('image');

            $product = new ProductCategory;
            $product->name = $request->name;
            $product->slug = Str::slug($request->name, '-');
            $product->save();

            return redirect()->route('products.category.index');
        } else {
            return redirect()->route('dashboard');
        } 
    }

    public function editProductsCategory($id)
    {
        if(Session::get('level') == 1) {
            $data['data'] = ProductCategory::find($id);
            $data['mode'] = 'edit';
            return view('products-category-form', $data);
        } else {
            return redirect()->route('dashboard');
        } 
    }

    public function updateProductsCategory(Request $request, $id)
    {
        if(Session::get('level') == 1) {
            $this->validate($request, [
                'name' => 'min:4|required',
            ]);

            $file = $request->file('image');
            
            $product = ProductCategory::find($id);
            $product->name = $request->name; 
            $product->slug = Str::slug($request->name, '-');
            $product->save();

            return redirect()->route('products.category.index');
        } else {
            return redirect()->route('dashboard');
        } 
    }

    public function deleteProductsCategory($id)
    {
        if(Session::get('level') == 1) {
            $product = ProductCategory::find($id);
            $product->delete();

            return redirect()->route('products.category.index');
        } else {
            return redirect()->route('dashboard');
        } 
    }

    public function orderUser()
    {
        if(Session::get('level') == 1) {
            $data['orders'] = Orders::all();
            // dd($data);
            return view('orders-user', $data);
        } else {
            return redirect()->route('dashboard');
        }
    }
}
