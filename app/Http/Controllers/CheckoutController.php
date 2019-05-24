<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Orders;
use App\OrderDetail;

class CheckoutController extends Controller
{
    public function index()
    {
        $userId = Session::get('id');
        $data['cart'] = \Cart::session($userId)->getContent();
        $data['subtotal'] = \Cart::session($userId)->getSubTotal();
        $data['total'] = \Cart::session($userId)->getTotal();

        return view('checkout', $data);
    }

    public function addCheckout(Request $request)
    {
        $userId = Session::get('id');
        $product = \Cart::session($userId)->getContent()->toArray();
        $total = \Cart::session($userId)->getTotal();
        $inv = 'INV'.\Carbon\Carbon::now()->format('Ymd').rand(1,1000);

        $orders = [
            'invoice' => $inv,
            'users_id' => $userId,
            'customer_name' => $request->customer_name,
            'customer_country' => $request->customer_country,
            'customer_province' => $request->customer_province,
            'customer_city' => $request->customer_city,
            'customer_address' => $request->customer_address,
            'customer_zip' => $request->customer_zip,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'payment_method' => $request->payment_method,
            'total' => $total,
            'order_date' => \Carbon\Carbon::now()->format('M, d Y'),
            'created_at' => Now(),
            'updated_at' => Now()
        ];

        foreach ($product as $value) {
            $data['orders_invoice'] = $inv;
            $data['products_id'] = $value['id'];
            $data['qty'] = $value['quantity'];
            $data['price'] = $value['price'];
            $data['created_at'] = Now();
            $data['updated_at'] = Now();
            $orderDetail[] = $data;
        }

        Orders::insert($orders);
        OrderDetail::insert($orderDetail);
        \Cart::session($userId)->clear();

        return redirect()->route('orders');
    }
}
