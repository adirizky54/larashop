@extends('layouts.app')

@section('content')

    <div class="product-details">
        <div class="container px-md-0 py-5">
            <div class="row">
                <div class="col-md-5 mb-4 mb-md-0">
                    <a id="shop-preview-image" href="#" class="img-wrap img-thumbnail img-thumbnail-zoom-in ui-bordered">
                        <span class="img-thumbnail-overlay bg-dark opacity-25"></span>
                        <span class="img-thumbnail-content text-white">
                            <i class="ui-icon ion ion-ios-search bg-primary border-0 text-white"></i>
                        </span>
                        <img src="{{ asset($products->image) }}">
                    </a>
                </div>
                <div class="col-md-7 product-detail">
                    <div class="title-nav d-flex justify-content-between align-items-center mb-3">
                        <h3 class="mb-0 line-height-condenced">{{ $products->name }}</h3>
                        <div class="nav-product">
                            <a href="javascript:void(0)" class="btn icon-btn btn-jwl-reverse btn-sm mr-1">
                                <i class="ion ion-ios-arrow-back"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn icon-btn btn-jwl-reverse btn-sm">
                                <i class="ion ion-ios-arrow-forward"></i>
                            </a>
                        </div>
                    </div>
                    <div class="rating-product mb-3">
                        <div class="ui-stars text-big mr-1">
                            <span class="ui-star filled">
                                <i class="ion ion-md-star"></i>
                                <i class="ion ion-md-star"></i>
                            </span>
                            <span class="ui-star filled">
                                <i class="ion ion-md-star"></i>
                                <i class="ion ion-md-star"></i>
                            </span>
                            <span class="ui-star filled">
                                <i class="ion ion-md-star"></i>
                                <i class="ion ion-md-star"></i>
                            </span>
                            <span class="ui-star filled">
                                <i class="ion ion-md-star"></i>
                                <i class="ion ion-md-star"></i>
                            </span>
                            <span class="ui-star filled">
                                <i class="ion ion-md-star"></i>
                                <i class="ion ion-md-star"></i>
                            </span>
                        </div>
                        <a href="#" class="text-jwl small">(Customer Review)</a>
                    </div>
                    <div class="price-product mb-4">
                        <span class="old-price d-none">$80.00</span>
                        <span class="current-price">Rp{{ number_format($products->price,0,'.','.') }}</span>
                    </div>
                    <div class="desc-product mb-4">
                        <p>{{ $products->description }}</p>
                    </div>
                    <div class="qty-product mb-4">
                        @if (Session::get('login'))
                        <form action="{{ route('cart.add')}}" method="POST" class="d-flex align-items-center justify-content-start">
                            @csrf
                            <input type="hidden" name="users_id" value="{{ Session::get('id') }}">
                            <input type="hidden" name="products_id" value="{{ $products->id }}">
                            <span class="font-weight-semibold">Quantity</span>
                            <input type="number" class="form-control mx-3" name="qty" value="1" min="1" max="{{ $products->qty }}">
                            <button type="submit" class="btn btn-jwl">Add To Cart</button>
                        </form>
                        @else
                        <div class="d-flex align-items-center justify-content-start">
                            <span class="font-weight-semibold">Quantity</span>
                            <input type="number" class="form-control mx-3" name="qty" value="1" min="1" max="{{ $products->qty }}">
                            <a href="{{ route('auth') }}" class="btn btn-jwl">Add To Cart</a>
                        </div>
                        @endif
                    </div>
                    <div class="action-product mb-4">
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-jwl-reverse" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">+ Add to Wishlist</a></li>
                            <li><a href="#" class="text-jwl-reverse" data-toggle="tooltip" data-placement="top" title="Compare">+ Compare</a></li>
                        </ul>
                    </div>
                    <div class="category-product mb-4">
                        <span class="font-weight-semibold mr-2">Category:</span>
                        <a href="#" class="text-jwl-reverse">{{ $products->productCategory->name }}</a>
                    </div>
                    <div class="social-product">
                        <ul class="list-inline social-border mb-0">
                            <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="ion ion-logo-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="ion ion-logo-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="ion ion-logo-pinterest"></i></a></li>
                            <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Google Plus"><i class="ion ion-logo-googleplus"></i></a></li>
                            <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="ion ion-logo-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <div class="product-info">
        <div class="container px-md-0 py-4">
            <div class="row">
                <div class="col-12">
                    <ul class="nav justify-content-center nav-lg nav-tabs tabs-alt">
                        <li class="nav-item">
                            <a class="nav-link font-weight-semibold active" data-toggle="tab" href="#nav-description">
                                Description
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-semibold" data-toggle="tab" href="#nav-reviews">
                                Reviews (1)
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active py-4" id="nav-description">
                            <p class="line-height-inherit">{{ $products->description }}</p>
                        </div>
                        <div class="tab-pane fade py-4" id="nav-reviews">
                            <div class="review-list mb-5">
                                <h4 class="font-weight-bold mb-4">1 Review For Donec Eu Furniture</h4>
                                <div class="media mb-3">
                                    <img src="{{ asset('img/comment2.jpg') }}" alt="" class="ui-w-60 mr-4">
                                    <div class="media-body">
                                        <div class="card">
                                            <div class="card-body p-3">
                                                <div class="user-info d-flex align-items-center justify-content-between mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <span class="h5 font-weight-bold text-uppercase mb-0">Admin</span>
                                                        <span class="ml-2 text-muted">- September 12, 2018</span>
                                                    </div>
                                                    <div class="ui-stars">
                                                        <span class="ui-star filled">
                                                            <i class="ion ion-md-star"></i>
                                                            <i class="ion ion-md-star"></i>
                                                        </span>
                                                        <span class="ui-star filled">
                                                            <i class="ion ion-md-star"></i>
                                                            <i class="ion ion-md-star"></i>
                                                        </span>
                                                        <span class="ui-star filled">
                                                            <i class="ion ion-md-star"></i>
                                                            <i class="ion ion-md-star"></i>
                                                        </span>
                                                        <span class="ui-star filled">
                                                            <i class="ion ion-md-star"></i>
                                                            <i class="ion ion-md-star"></i>
                                                        </span>
                                                        <span class="ui-star filled">
                                                            <i class="ion ion-md-star"></i>
                                                            <i class="ion ion-md-star"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="user-reviews">
                                                    <p class="card-text">roadthemes</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="review-add">
                                <form action="">
                                    <h4 class="font-weight-bold mb-3">Add A Review</h4>
                                    <p class="mb-4">Your email address will not be published. Required fields are marked</p>

                                    <h5 class="font-weight-bold mb-3">Your Rating</h5>
                                    <div class="ui-stars mb-4">
                                        <span class="ui-star filled">
                                            <i class="ion ion-md-star"></i>
                                            <i class="ion ion-md-star"></i>
                                        </span>
                                        <span class="ui-star filled">
                                            <i class="ion ion-md-star"></i>
                                            <i class="ion ion-md-star"></i>
                                        </span>
                                        <span class="ui-star filled">
                                            <i class="ion ion-md-star"></i>
                                            <i class="ion ion-md-star"></i>
                                        </span>
                                        <span class="ui-star filled">
                                            <i class="ion ion-md-star"></i>
                                            <i class="ion ion-md-star"></i>
                                        </span>
                                        <span class="ui-star filled">
                                            <i class="ion ion-md-star"></i>
                                            <i class="ion ion-md-star"></i>
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Your Review</label>
                                        <textarea class="form-control" rows="5" placeholder="Your Review"></textarea>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-jwl-reverse">Submit</button>
                                </form>                                
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-related">
        <div class="container px-md-0 pt-3 pb-5">
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container swiper-jwl" id="latest-product">
                        <div class="section-title">
                            <h2>Related Products</h2>
                        </div>
                        <div class="swiper-wrapper">
                            @foreach ($related as $item)
                            <div class="swiper-slide">
                                <div class="card card-product card-hover">
                                    <a href="{{ route('product', $item->id) }}" class="img-wrap">
                                        <img src="{{ asset($item->image) }}">
                                    </a>
                                    <div class="product-content text-center p-4">
                                        <div class="product-category mb-3">
                                            <a href="#">{{ $item->productCategory->name }}</a>
                                        </div>
                                        <h3 data-toggle="tooltip" data-placement="top" title="{{ $item->name }}"><a href="product-details.html">{{ Str::limit($item->name, 15, '..') }}</a></h3>
                                        <div class="product-price">
                                            <span class="old-price d-none">$86.00</span>
                                            <span class="current-price">Rp{{ number_format($item->price,0,'.','.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                        <div class="swiper-button-prev custom-icon">
                            <i class="ion ion-ios-arrow-back"></i>
                        </div>
                        <div class="swiper-button-next custom-icon">
                            <i class="ion ion-ios-arrow-forward"></i>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

@endsection