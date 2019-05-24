@extends('layouts.app')

@section('content')

    <div class="page-title">
        <div class="container px-md-0 py-5 border-bottom">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="font-weight-bold mb-0">Checkout</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-checkout py-4">
        <div class="container px-md-0 py-3 py-md-5">
            <form action="{{ route('checkout.add') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <div class="cart-title border-bottom mb-4">
                            <h4>Billing Details</h4>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Name *</label>
                            <input type="text" class="form-control" placeholder="Name" name="customer_name" autofocus required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Country *</label>
                            <select class="custom-select" name="customer_country" required>
                                <option>Indonesia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Province *</label>
                            <select class="custom-select" name="customer_province" required>
                                <option>Jawa Barat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">City *</label>
                            <select class="custom-select" name="customer_city" required>
                                <option>Kab. Majalengka</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Street address *</label>
                            <textarea class="form-control" placeholder="Houe number and street" name="customer_address" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Postal Code *</label>
                            <input type="number" class="form-control" name="customer_zip" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone *</label>
                            <input type="number" class="form-control" name="customer_phone" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address *</label>
                            <input type="email" class="form-control" name="customer_email" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Payment Method</label>
                            <label class="custom-control custom-radio">
                                <input name="payment_method" type="radio" class="custom-control-input" value="BCA" checked>
                                <span class="custom-control-label">BCA</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input name="payment_method" type="radio" class="custom-control-input" value="Mandiri">
                                <span class="custom-control-label">Mandiri</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-title border-bottom mb-4">
                            <h4>Your Order</h4>                                
                        </div>
                        <table class="table mb-4">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                <tr>
                                    <td>
                                        {{ $item->name }} <span class="font-weight-semibold">x {{ $item->quantity }}</span>
                                    </td>
                                    <td class="text-right">Rp{{ number_format($item->price,0,'.','.') }}</td>
                                </tr>
                                @endforeach                                
                                <tr>
                                    <th>Subtotal</th>
                                    <td class="font-weight-semibold text-right">Rp{{ number_format($subtotal,0,'.','.') }}</td>
                                </tr>
                                <tr>
                                    <th class="align-middle"><h4 class="mb-0">Total</h4></th>
                                    <td class="align-middle text-right"><h4 class="text-jwl font-weight-semibold mb-0">Rp{{ number_format($total, 0,'.','.') }}</h4></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <input type="hidden" name="products" value="{{ $cart }}">
                            <input type="hidden" name="total" value="{{ $total }}">
                            <button type="submit" class="btn btn-jwl-reverse btn-lg">
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection