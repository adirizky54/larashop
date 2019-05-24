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
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0">Products</h4>
                        <a href="{{ route('products.add') }}" class="btn btn-jwl">
                            <i class="ion ion-md-add mr-1"></i>
                            Add Product
                        </a>
                    </div>                    
                    <div class="card">
                        <table class="table card-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th class="text-center">Stock</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$products->isEmpty())
                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                            <div class="media align-items-center">
                                                <img class="ui-w-40 d-block" src="{{ asset($item->image) }}" alt="">
                                                <a href="javascript:void(0)" class="media-body d-block text-body ml-3">{{ $item->name }}</a>
                                            </div>
                                        </td>
                                        <td class="align-middle">{{ $item->productCategory->name }}</td>
                                        <td class="align-middle">Rp{{ number_format($item->price,0,'.','.') }}</td>
                                        <td class="align-middle text-center">{{ $item->qty }}</td>
                                        <td class="align-middle text-center text-nowrap">
                                            <a href="{{ route('products.edit', $item->id) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="ion ion-md-create mr-1"></i>
                                                Edit
                                            </a>&nbsp;&nbsp;
                                            <a href="{{ route('products.delete', $item->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Remove">
                                                <i class="ion ion-md-trash mr-1"></i>
                                                Remove
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">
                                            Product is empty
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

@endsection