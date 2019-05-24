<div class="card">
    <div class="card-header">
        <a class="d-flex justify-content-between text-dark font-weight-semibold" data-toggle="collapse" href="#shop-filters-1" aria-expanded="true">
            Menu
            <div class="collapse-icon"></div>
        </a>
    </div>
    
    <div class="collapse show" id="shop-filters-1">
        <div class="side-menu my-2">
            <a href="{{ route('dashboard') }}" class="list-side-menu list-side-menu-action {{ Route::currentRouteName() == 'dashboard' ? 'active' : ''}}">
                <i class="ion ion-md-speedometer mr-2"></i>
                Dashboard
            </a>            
            <a href="{{ route('orders') }}" class="list-side-menu list-side-menu-action {{ Route::currentRouteName() == 'orders' ? 'active' : ''}}">
                <i class="ion ion-md-paper mr-2"></i>
                Orders
            </a>
            @if(Session::get('level') == 1)
            <div class="menu-divider">
                <div class="text-muted px-4 my-2">
                    Admin
                </div>
                <a href="{{ route('products.index') }}" class="list-side-menu list-side-menu-action {{ Route::currentRouteName() == 'products.index' ? 'active' : ''}}">
                    <i class="ion ion-ios-journal mr-2"></i>
                    Products
                </a>
                <a href="{{ route('products.category.index') }}" class="list-side-menu list-side-menu-action {{ Route::currentRouteName() == 'products.category.index' ? 'active' : ''}}">
                    <i class="ion ion-md-pricetag mr-2"></i>
                    Products Category
                </a>
                <a href="{{ route('order-user') }}" class="list-side-menu list-side-menu-action {{ Route::currentRouteName() == 'order-user' ? 'active' : ''}}">
                    <i class="ion ion-ios-list-box mr-2"></i>
                    Order User
                </a>
            </div>
            @else @endif
            <a href="{{ route('logout') }}" class="list-side-menu list-side-menu-action">
                <i class="ion ion-md-power mr-2"></i>
                Logout   
            </a>
        </div>
    </div>
</div>
