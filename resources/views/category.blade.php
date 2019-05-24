@extends('layouts.app')

@section('content')

    <div class="page-category">
        <div class="container px-md-0 py-5">
            <div class="row">
                <div class="col-lg-3 mb-4">
                    <div class="category-filter mb-5">
                        <h4 class="mb-4">Categories</h4>
                        <ul class="list-unstyled">
                            @foreach ($categories as $item)
                            <li class="py-2 border-bottom">
                                <a href="{{ route('category', ['category_id' => $item->id]) }}" class="text-jwl-reverse d-block">{{ $item->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-price">
                        <h4 class="mb-4">Filter by Price</h4>
                        <form action="{{ url()->full() }}" method="get">
                            <input type="hidden" name="category_id" value="{{ Request::get('category_id') }}">
                            <div id="shop-price-slider" class="shop-filters-slider noUi-primary mt-2 mb-4"></div>
                            <div class="input-group input-group-sm my-3">
                                <input id="price_min" type="text" name="price_min" value="" placeholder="Harga Minimum" class="form-control text-center">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-transparent border-0">–</div>
                                </div>
                                <input id="price_max" type="text" name="price_max" value="" placeholder="Harga Maximum" class="form-control text-center">
                            </div>
                            <button type="submit" class="btn btn-jwl-reverse">Filter</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        @if(!$products->isEmpty())
                        @foreach ($products as $item)
                        <div class="col-lg-4 col-md-4 mb-4">
                            <div class="card card-product card-hover">
                                <a href="{{ route('product', $item->id) }}" class="img-wrap">
                                    <img src="{{ asset($item->image) }}">
                                </a>
                                <div class="product-content text-center p-4">
                                    <div class="product-category mb-3">
                                        <a href="#">{{ $item->productCategory->name }}</a>
                                    </div>
                                    <h3 data-toggle="tooltip" data-placement="top" title="{{ $item->name }}"><a href="{{ route('product', $item->id) }}">{{ Str::limit($item->name, 20, '..') }}</a></h3>
                                    <div class="product-price">
                                        <span class="old-price d-none">$86.00</span>
                                        <span class="current-price">Rp{{ number_format($item->price,0,'.','.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-lg-12">
                            <p>Produk tidak ditemukan</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection