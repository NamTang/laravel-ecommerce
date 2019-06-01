@extends('layouts.user')

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/electro/img/shop01.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop<br>Collection</h3>
                        <a href="{{route('show_store_by_category', 1)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/electro/img/shop03.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Accessories<br>Collection</h3>
                        <a href="{{route('show_store_by_category', 4)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/electro/img/shop02.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Cameras<br>Collection</h3>
                        <a href="{{route('show_store_by_category', 3)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Days</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>10</h3>
                                <span>Hours</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>34</h3>
                                <span>Mins</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>60</h3>
                                <span>Secs</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p>New Collection Up to 50% OFF</p>
                    <a class="primary-btn cta-btn" href="#">Shop now</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Hot Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @foreach ($cats as $cat)
                            <li class="{{$loop->index == 0 ? 'active' : ''}}"><a data-toggle="tab" href="#tab-{{$loop->index}}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        @foreach($map as $m)
                        <div id="tab-{{$loop->index}}" class="tab-pane {{$loop->index == 0 ? 'active' : ''}}">
                            <div class="products-slick" data-nav="#slick-nav-{{$loop->index}}">

                                @forelse($m as $prod)
                                <!-- product -->

                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{$prod->picture}}" alt="">
                                        <div class="product-label">
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$prod->catId}}</p>
                                        <h3 class="product-name"><a href="{{route('show_product', $prod->id)}}">{{$prod->name}}</a></h3>
                                        <h4 class="product-price">{{$prod->price}}</h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <form action="{{route('cart_add', $prod->id)}}" method="post">
                                             @csrf
                                            <button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </form>
                                    </div>
                                </div>
                                @empty
                                <div class="col-xs-12 text-center">
                                    <div class="empty-cart">
                                        <img src="{{asset('/icon/box-256.png')}}"></img>
                                        <p class="message">Không có sản phẩm nào.</p>
                                    </div>
                                </div>
                                <!-- /product -->
                                @endforelse
                            </div>
                            {{$m->links()}}
                        </div>

                        @endforeach
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
