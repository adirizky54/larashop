@extends('layouts.app')

@section('content')

    <div class="page-title">
        <div class="container px-md-0 py-5 border-bottom">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="font-weight-bold mb-0">Shopping Cart</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-cart py-4">
        <div class="container px-md-0 py-3 py-md-5">
            <div class="row">
                @if(!$status)
                <div class="col-md-12">
                    <div class="cart-table mb-4">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 140px;">Image</th>
                                        <th style="min-width: 200px;">Product</th>
                                        <th style="min-width: 130px;">Price</th>
                                        <th style="width: 120px;">Quantity</th>
                                        <th style="min-width: 130px;">Total</th>
                                        <th style="min-width: 50px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)
                                    <form action="{{ route('cart.update')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <tr>
                                            <td class="text-center align-middle">
                                                <img src="{{ asset($item->attributes->image) }}" alt="" class="ui-w-120">
                                            </td>
                                            <td class="text-center align-middle">{{ $item->name }}</td>
                                            <td class="text-center align-middle font-weight-semibold">Rp{{ number_format($item->price,0,'.','.') }}</td>
                                            <td class="p-4 align-middle"><input type="number" class="form-control" value="{{ $item->quantity }}" min="1" name="qty"></td>
                                            <td class="text-center align-middle font-weight-semibold text-jwl">Rp{{ number_format($item->price * $item->quantity, 0,'.','.')  }}</td>
                                            <td class="text-center align-middle">
                                                <a href="{{ route('cart.remove', $item->id) }}" class="text-jwl-reverse text-big"><i class="ion ion-md-close"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="text-right">
                                                <button type="submit" class="btn btn-jwl-reverse">
                                                    Update Cart
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-5 mb-md-0">
                            <div class="cart-title border-bottom mb-4">
                                <h4>Coupon</h4>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Enter your coupon code if you have one.</label>
                                <input type="text" class="form-control" placeholder="Coupon Code">
                            </div>
                            <button type="submit" class="btn btn-jwl-reverse">Apply Coupon</button>
                        </div>
                        <div class="col-md-6">
                            <div class="cart-title border-bottom mb-4">
                                <h4>Cart Totals</h4>                                
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>Subtotal</div>
                                <div class="text-jwl font-weight-semibold">Rp{{ number_format($subtotal,0,'.','.') }}</div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between py-3 mb-3">
                                <h4 class="mb-0">Total</h4>
                                <h4 class="text-jwl font-weight-bold mb-0">Rp{{ number_format($total,0,'.','.') }}</h4>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('checkout') }}" class="btn btn-jwl btn-lg">Proceed To Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <p>Your cart is currently empty.</p>
                    <a href="{{ route('home') }}" class="btn btn-jwl-reverse">Return To Shop</a>
                </div>
                @endif                
            </div>            
        </div>
    </div>

@endsection