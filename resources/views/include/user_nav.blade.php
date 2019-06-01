<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i>0367679832</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i>namkty96@gmail.com</a></li>
            </ul>
            <ul class="header-links pull-right">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" style="text-align: center;" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" style="color: black; display: block; margin-bottom: 5px; margin-top: 5px;" href="{{ route('user_order') }}">
                            My Orders
                        </a>
                        <a class="dropdown-item" style="color: black;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->
    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{route('home')}}" class="logo">
                            <img src="/electro/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{route('show_store')}}" method="get">
                            <select class="input-select" name="catId">
                                @foreach(App\ProductKind::get() as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            <input class="input" name="search" placeholder="Search here">
                            <button class="search-btn" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Cart -->
                        @inject('provider', 'App\Http\Controllers\CartController')
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">{{$provider::show()->count()}}</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @forelse($provider::show() as $cart)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{$cart->picture}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="{{route('show_product', $cart->id)}}">{{$cart->name}}</a></h3>
                                            <h4 class="product-price"><span class="qty"> {{$cart->quantity}}</span> {{$cart->price * $cart->quantity}}</h4>
                                        </div>
                                        <form action="{{route('cart_remove', $cart->catId)}}" method="post">
                                            @csrf
                                            <button class="delete" type="submit"><i class="fa fa-close"></i></button>
                                        </form>
                                    </div>
                                    @empty
                                    <div></div>
                                    @endforelse
                                </div>
                                <div class="cart-summary">
                                    <small>{{$provider::show()->count()}} Item(s) selected</small>
                                    @php
                                    $total = 0;
                                    foreach($provider::show() as $cart) {
                                    $total = ($cart->price * $cart->quantity);
                                    }
                                    echo "<h5>SUBTOTAL: ".$total."</h5>";
                                    @endphp

                                </div>
                                <div class="cart-btns">
                                    <a href="{{route('cart')}}">View Cart</a>
                                    <a href="{{route('checkout')}}">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{{route('home')}}">Home</a></li>
                @foreach (App\ProductKind::get() as $cat)
                <li><a href="{{route('show_store_by_category', $cat->id)}}">{{$cat->name}}</a></li>
                @endforeach
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
