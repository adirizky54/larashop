<?php

namespace App\Http\Controllers;

use App\Orders;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        if(Session::get('login')) {
            return view('dashboard');
        } else {
            return redirect()->route('home');
        }
    }

    public function orders()
    {
        if(Session::get('login')) {
            $data['orders'] = Orders::where('users_id', Session::get('id'))->get();
            return view('orders', $data);
        } else {
            return redirect()->route('home');
        }        
    }

    public function deleteOrders($id)
    {
        if(Session::get('login')) {
            $inv = Orders::find($id);
            Orders::where('id', $id)->delete();
            OrderDetail::where('orders_invoice', $inv->invoice)->delete();
            
            return redirect()->route('orders');
        } else {
            return redirect()->route('home');
        }        
    }
}
