    <!-- Navbar -->
    <?php $category = App\ProductCategory::all() ?>
    <header>
        <div class="header-top border-bottom">
            <div class="container d-flex align-items-center justify-content-between small py-2 px-md-0">
                <div>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-jwl-reverse font-weight-semibold" href="javascript:void(0)" data-toggle="dropdown" data-trigger="hover">English</a>
                                <div class="dropdown-menu mt-3">
                                    <a class="dropdown-item" href="javascript:void(0)">French</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Germany</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Japanese</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-jwl-reverse font-weight-semibold ml-3" href="javascript:void(0)" data-toggle="dropdown" data-trigger="hover">USD</a>
                                <div class="dropdown-menu mt-3">
                                    <a class="dropdown-item" href="javascript:void(0)">EUR - Euro</a>
                                    <a class="dropdown-item" href="javascript:void(0)">GBP - British Pound</a>
                                    <a class="dropdown-item" href="javascript:void(0)">INR - India Rupee</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <div class="social-icon text-right">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="ion ion-logo-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ion ion-logo-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ion ion-logo-rss"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ion ion-logo-googleplus"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ion ion-logo-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle border-bottom">
            <div class="container px-md-0 py-3">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 col-3">
                        <div class="logo">
                            <a href="{{ route('home') }}" class="navbar-brand">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="header-brand-img">
                            </a>
                        </div>                        
                    </div>
                    <div class="col-lg-10 col-md-9 col-9">
                        <div class="d-flex justify-content-end">
                            <div class="search-form mr-2 mr-md-3">                                
                                <div class="dropdown dropdown-toggle-hide-arrow">
                                    <a class="btn btn-default dropdown-toggle px-3" href="javascript:void(0)" data-toggle="dropdown" data-trigger="hover">
                                        <i class="ion ion-md-search"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right py-0">
                                        <form action="">
                                            <div class="form-group mb-0">
                                                <div class="input-group">                                        
                                                    <input type="text" class="form-control" placeholder="Search product...">
                                                    <span class="input-group-append">
                                                        <button class="btn btn-default" type="submit"><i class="ion ion-ios-search"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="box-setting mr-2 mr-md-3">
                                <div class="dropdown dropdown-toggle-hide-arrow">
                                    <a class="btn btn-default dropdown-toggle px-3" href="javascript:void(0)" data-toggle="dropdown" data-trigger="hover">
                                        <i class="ion ion-md-settings"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">                                        
                                        @if(Session::get('login'))
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">My Account</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Whistlist</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                        @else
                                        <a class="dropdown-item" href="{{ route('auth') }}">Login</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="cart">
                                <div class="shop-cart dropdown dropdown-toggle-hide-arrow">
                                    <a class="btn btn-default text-nowrap dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" data-trigger="hover">
                                        <i class="ion ion-md-cart mr-2"></i>
                                        <span class="badge badge-pill badge-jwl indicator">{{ Session::get('login') == 1 ? \Cart::session(Session::get('id'))->getTotalQuantity() : '0' }}</span>
                                        <span class="border-left font-weight-semibold pl-2 d-none d-md-inline-block">Rp{{ Session::get('login') == 1 ? number_format(\Cart::session(Session::get('id'))->getSubTotal(),0,'.','.') : '0' }}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right py-0">
                                        @if(Session::get('login'))
                                            @if(!\Cart::session(Session::get('id'))->isEmpty())
                                            <ul class="list-group list-group-flush">
                                                @foreach (\Cart::session(Session::get('id'))->getContent() as $item)
                                                <li class="list-group-item py-3">
                                                    <div class="media align-items-start">
                                                        <img src="{{ asset($item->attributes->image) }}" class="d-block ui-w-80" alt="">
                                                        <div class="media-body mx-3">
                                                            <a href="javascript:void(0)" class="text-jwl line-height-condenced">
                                                                <h6 class="mb-0">
                                                                    {{ $item->name }}
                                                                </h6>
                                                            </a>
                                                            <div class="my-1">Qty : {{ $item->quantity }}</div>
                                                            <div class="price-cart">Rp{{ number_format($item->price, 0,'.','.') }}</div>
                                                        </div>
                                                        <a href="javascript:void(0)" class="text-jwl">
                                                            <i class="ion ion-md-close"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                @endforeach
                                                <li class="list-group-item py-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>Subtotal:</div>
                                                        <div>Rp{{ number_format(\Cart::session(Session::get('id'))->getSubTotal(),0,'.','.') }}</div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item bg-shopping-cart-bottom rounded-bottom py-4">                                                
                                                    <a href="{{ route('cart') }}" class="btn btn-shopping-cart btn-block mb-3">View Cart</a>
                                                    <a href="{{ route('checkout') }}" class="btn btn-shopping-cart btn-block">Checkout</a>                                                
                                                </li>
                                            </ul>
                                            @else
                                            <div class="px-2 py-4 text-center">
                                                Your cart is currently empty.
                                            </div>
                                            @endif
                                        @else
                                            @if(!\Cart::isEmpty())
                                            <ul class="list-group list-group-flush">
                                                @foreach (\Cart::getContent() as $item)
                                                <li class="list-group-item py-3">
                                                    <div class="media align-items-start">
                                                        <img src="{{ asset($item->attributes->image) }}" class="d-block ui-w-80" alt="">
                                                        <div class="media-body mx-3">
                                                            <a href="javascript:void(0)" class="text-jwl line-height-condenced">
                                                                <h6 class="mb-0">
                                                                    {{ $item->name }}
                                                                </h6>
                                                            </a>
                                                            <div class="my-1">Qty : {{ $item->quantity }}</div>
                                                            <div class="price-cart">Rp{{ number_format($item->price, 0,'.','.') }}</div>
                                                        </div>
                                                        <a href="javascript:void(0)" class="text-jwl">
                                                            <i class="ion ion-md-close"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                @endforeach
                                                <li class="list-group-item py-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>Subtotal:</div>
                                                        <div>Rp{{ number_format(\Cart::getSubTotal(),0,'.','.') }}</div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item bg-shopping-cart-bottom rounded-bottom py-4">                                                
                                                    <a href="{{ route('cart') }}" class="btn btn-shopping-cart btn-block mb-3">View Cart</a>
                                                    <a href="{{ route('checkout') }}" class="btn btn-shopping-cart btn-block">Checkout</a>                                                
                                                </li>
                                            </ul>
                                            @else
                                            <div class="px-2 py-4 text-center">
                                                Your cart is currently empty.
                                            </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>                            
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom border-bottom">
            <nav class="navbar navbar-expand-md bg-white">
                <div class="container px-md-0">
                    <a class="navbar-brand font-weight-semibold d-block d-md-none" href="javascript:void(0)">Menu</a>
                    <button class="navbar-toggler d-block d-md-none" type="button" data-toggle="collapse" data-target="#menu-bottom">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="menu-bottom">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link text-jwl font-weight-semibold" href="javascript:void(0)">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-jwl font-weight-semibold dropdown-toggle" href="#" data-toggle="dropdown" data-trigger="hover">Product Category</a>
                                <div class="dropdown-menu mt-2">
                                    @foreach ($category as $item)
                                    <a class="dropdown-item" href="{{ route('category', ['category_id' => $item->id]) }}">{{ $item->name }}</a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>                
            </nav>
        </div>
    </header>
    <!-- Navbar -->