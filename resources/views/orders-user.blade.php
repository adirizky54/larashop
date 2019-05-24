@extends('layouts.app')

@section('content')

    <div class="page-title">
        <div class="container px-md-0 py-5 border-bottom">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="font-weight-bold mb-0">My Account</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="user-login py-4">
        <div class="container px-md-0 py-3 py-md-5">
            <div class="row">
                <div class="col-lg-3">
                    @include('layouts.sidemenu')
                </div>
                <div class="col-lg-9">
                    <h4>Orders</h4>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table card-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">Invoice</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!$orders->isEmpty())
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->invoice }}</td>
                                            <td class="text-center">{{ $item->users->name }}</td>
                                            <td class="text-center">{{ $item->order_date }}</td>
                                            <td class="text-center">Rp{{ number_format($item->total,0,'.','.') }}</td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">
                                                Order User is empty
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection