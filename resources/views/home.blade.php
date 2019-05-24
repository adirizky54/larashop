@extends('layouts.app')

@section('content')
    <!-- Hero slider -->
    <div class="swiper-container" id="shop-hero-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide shop-hero-slider-animating ui-bg-cover" style="background-image: url({{ asset('img/slider3.jpg') }})">
                <div class="container px-md-0">
                    <div class="shop-hero-container d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="text-center text-md-left py-5">
                            <div>Exclusive Offer -10% Off This Week</div>
                            <div class="shop-hero-slider-animated display-3 font-weight-semibold mb-2">Dennis Arrivals</div>
                            <div class="shop-hero-slider-animated">
                                Starting At <span class="text-jwl text-xlarge font-weight-bold ml-2">$2.199.00</span>
                            </div>
                            <button type="button" class="shop-hero-slider-animated btn btn-jwl btn-lg font-weight-semibold mt-5">SHOPPING NOW</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide shop-hero-slider-animating ui-bg-cover" style="background-image: url({{ asset('img/slider4.jpg') }})">
                <div class="container px-md-0">
                    <div class="shop-hero-container d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="text-center text-md-left py-5">
                            <div>Exclusive Offer -10% Off This Week</div>
                            <div class="shop-hero-slider-animated display-3 font-weight-semibold mb-2">Fall Sale Of</div>
                            <div class="shop-hero-slider-animated">
                                Starting At <span class="text-jwl text-xlarge font-weight-bold ml-2">$2.199.00</span>
                            </div>
                            <button type="button" class="shop-hero-slider-animated btn btn-jwl btn-lg font-weight-semibold mt-5">SHOPPING NOW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- Hero slider -->

    <!-- Banner Section -->
    <section class="banner mt-5 mb-4">
        <div class="container px-md-0">
            <div class="row">
                <div class="col-md-6 col-lg-6 mb-4">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="#"><img src="{{ asset('img/banner5.jpg') }}" alt="" class="img-fluid"></a>
                            <div class="banner_content">
                                <p>Design Creative</p>
                                <h2>Modern and Clean</h2>
                                <span>From $60.99 – Sale 20%</span>
                            </div>
                        </div>
                    </div>     
                </div>
                <div class="col-md-6 col-lg-6 mb-4">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="#"><img src="{{ asset('img/banner6.jpg') }}" alt="" class="img-fluid"></a>
                            <div class="banner_content">
                                <p>Bestselling Products</p>
                                <h2>Jewelry and Diamonds</h2>
                                <span>Only from $89.00</span>
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section -->

    <!-- Latest Product Section -->
    <section class="mb-5">
        <div class="container px-md-0">
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container swiper-jwl" id="latest-product">
                        <div class="section-title">
                            <h2>Latest Products</h2>
                        </div>
                        <div class="swiper-wrapper">
                            @foreach ($products as $item)
                            <div class="swiper-slide">
                                <div class="card card-product card-hover">
                                    <a href="{{ route('product', $item->id) }}" class="img-wrap">
                                        <img src="{{ asset(asset($item->image)) }}">
                                    </a>
                                    <div class="product-content text-center p-4">
                                        <div class="product-category mb-3">
                                            <a href="#">{{ $item->productCategory->name }}</a>
                                        </div>
                                        <h3 data-toggle="tooltip" data-placement="top" title="{{ $item->name }}"><a href="{{ route('product', $item->id) }}">{{ Str::limit($item->name, 15, '..') }}</a></h3>
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
    </section>
    <!-- Latest Product Section -->

    <!-- Offer Section -->
    <section class="mb-5">
        <div class="container px-md-0">
            <div class="row">
                <div class="col-md-6">
                    <div class="offer-item p-3 py-4 text-center">
                        <h4 class="mb-0">Money Return Guarantee</h4>
                        <p class="mb-0">Back guarantee under 30 days</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="offer-item p-3 py-4 text-center">
                        <h4 class="mb-0">Free Shipping On Order Over $120</h4>
                        <p class="mb-0">Free shipping on all order</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Offer Section -->

    <!-- Product Section -->
    <section class="product-section mb-4">
        <div class="container px-md-0 py-5">
            <div class="row">
                <div class="col-12">
                    <div class="product_tab_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="true">Featured</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#arrivals" role="tab" aria-controls="arrivals" aria-selected="false">New Arrivals</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#onsale" role="tab" aria-controls="onsale" aria-selected="false">Onsale</a>
                            </li>                          
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="featured" role="tabpanel">
                            <div class="swiper-container" id="product-featured">
                                <div class="swiper-wrapper">
                                    @foreach ($products as $item)
                                    <div class="swiper-slide">
                                        <div class="card card-product card-hover">
                                            <a href="{{ route('product', $item->id) }}" class="img-wrap">
                                                <img src="{{ asset($item->image) }}">
                                            </a>
                                            <div class="product-content text-center p-4">
                                                <div class="product-category mb-3">
                                                    <a href="#">{{ $item->productCategory->name }}</a>
                                                </div>
                                                <h3 data-toggle="tooltip" data-placement="top" title="{{ $item->name }}"><a href="{{ route('product', $item->id) }}">{{ Str::limit($item->name, 15, '..') }}</a></h3>
                                                <div class="product-price">
                                                    <span class="old-price d-none">$86.00</span>
                                                    <span class="current-price">Rp{{ number_format($item->price,0,'.','.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="arrivals" role="tabpanel">
                            <div class="swiper-container" id="product-arrivals">
                                <div class="swiper-wrapper">
                                    @foreach ($products as $item)
                                    <div class="swiper-slide">
                                        <div class="card card-product card-hover">
                                            <a href="{{ route('product', $item->id) }}" class="img-wrap">
                                                <img src="{{ asset($item->image) }}">
                                            </a>
                                            <div class="product-content text-center p-4">
                                                <div class="product-category mb-3">
                                                    <a href="#">{{ $item->productCategory->name }}</a>
                                                </div>
                                                <h3 data-toggle="tooltip" data-placement="top" title="{{ $item->name }}"><a href="{{ route('product', $item->id) }}">{{ Str::limit($item->name, 15, '..') }}</a></h3>
                                                <div class="product-price">
                                                    <span class="old-price d-none">$86.00</span>
                                                    <span class="current-price">Rp{{ number_format($item->price,0,'.','.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="onsale" role="tabpanel">
                            <div class="swiper-container" id="product-onsale">
                                <div class="swiper-wrapper">
                                    @foreach ($products as $item)
                                    <div class="swiper-slide">
                                        <div class="card card-product card-hover">
                                            <a href="{{ route('product', $item->id) }}" class="img-wrap">
                                                <img src="{{ asset($item->image) }}">
                                            </a>
                                            <div class="product-content text-center p-4">
                                                <div class="product-category mb-3">
                                                    <a href="#">{{ $item->productCategory->name }}</a>
                                                </div>
                                                <h3 data-toggle="tooltip" data-placement="top" title="{{ $item->name }}"><a href="{{ route('product', $item->id) }}">{{ Str::limit($item->name, 15, '..') }}</a></h3>
                                                <div class="product-price">
                                                    <span class="old-price d-none">$86.00</span>
                                                    <span class="current-price">Rp{{ number_format($item->price,0,'.','.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section -->

    <section class="news-section py-5 mb-3">
        <div class="container px-md-0">
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container swiper-jwl" id="news-swiper">
                        <div class="section-title">
                            <h2>Monsta News</h2>
                        </div>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="news-item text-center">
                                    <a href="javascript:void(0)" class="img-thumbnail">
                                        <div class="img-thumbnail-overlay bg-dark opacity-50"></div>
                                        <img src="{{ asset('img/blog1.jpg') }}" alt class="img-fluid">
                                    </a>
                                    <h4 class="my-3">
                                        <a href="blog-details.html" class="title-news">Maecenas ultricies</a>
                                    </h4>
                                    <div class="author text-muted mb-3">
                                        <p>By <span class="text-jwl">Admin</span> / 30 Oct 2018</p>                                        
                                    </div>
                                    <div class="news-desc">
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                    </div>
                                    <a href="javascript:void(0)" class="text-jwl">Read More</a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="news-item text-center">
                                    <a href="javascript:void(0)" class="img-thumbnail">
                                        <div class="img-thumbnail-overlay bg-dark opacity-50"></div>
                                        <img src="{{ asset('img/blog2.jpg') }}" alt class="img-fluid">
                                    </a>
                                    <h4 class="my-3">
                                        <a href="blog-details.html" class="title-news">Blog Image Post</a>
                                    </h4>
                                    <div class="author text-muted mb-3">
                                        <p>By <span class="text-jwl">Admin</span> / 30 Oct 2018</p>                                        
                                    </div>
                                    <div class="news-desc">
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                    </div>
                                    <a href="javascript:void(0)" class="text-jwl">Read More</a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="news-item text-center">
                                    <a href="javascript:void(0)" class="img-thumbnail">
                                        <div class="img-thumbnail-overlay bg-dark opacity-50"></div>
                                        <img src="{{ asset('img/blog3.jpg') }}" alt class="img-fluid">
                                    </a>
                                    <h4 class="my-3">
                                        <a href="blog-details.html" class="title-news">Post With Gallery</a>
                                    </h4>
                                    <div class="author text-muted mb-3">
                                        <p>By <span class="text-jwl">Admin</span> / 30 Oct 2018</p>                                        
                                    </div>
                                    <div class="news-desc">
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                    </div>
                                    <a href="javascript:void(0)" class="text-jwl">Read More</a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="news-item text-center">
                                    <a href="javascript:void(0)" class="img-thumbnail">
                                        <div class="img-thumbnail-overlay bg-dark opacity-50"></div>
                                        <img src="{{ asset('img/blog4.jpg') }}" alt class="img-fluid">
                                    </a>
                                    <h4 class="my-3">
                                        <a href="blog-details.html" class="title-news">Post With Video</a>
                                    </h4>
                                    <div class="author text-muted mb-3">
                                        <p>By <span class="text-jwl">Admin</span> / 30 Oct 2018</p>                                        
                                    </div>
                                    <div class="news-desc">
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                    </div>
                                    <a href="javascript:void(0)" class="text-jwl">Read More</a>
                                </div>
                            </div>
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
    </section>

    <!-- Newsletter Section -->
    <div class="newsletter border-top">
        <div class="container px-md-0 py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h3 class="mb-2">Our Newsletter</h3>
                    <p class="mb-5">Get E-mail updates about our latest shop and special offers.</p>
                    <form action="">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-append">
                                    <button class="btn btn-jwl" type="submit">Subscribe</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter Section -->
@endsection