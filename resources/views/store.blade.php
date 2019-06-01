@extends('layouts.user')

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- STORE -->
            <div id="store" class="col-md-12">
                <!-- store products -->
                <div class="row">
                    @forelse($prods as $p)
                    <!-- product -->
                    <div class="col-md-3 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{$p->picture}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{$p->catId}}</p>
                                <h3 class="product-name"><a href="{{route('show_product', $p->id)}}">{{$p->name}}</a></h3>
                                <h4 class="product-price">{{number_format($p->price)}}</h4>
                            </div>
                            <div class="add-to-cart">
                                <form action="{{route('cart_add', $p->id)}}" method="post">
                                    @csrf
                                    <button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /product -->
                    @empty
                    <div class="col-xs-12 text-center">
                        <div class="empty-cart">
                            <img src="{{asset('/icon/box-256.png')}}"></img>
                            <p class="message">Không có sản phẩm nào.</p>
                        </div>
                    </div>
                    @endforelse
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                  {{$prods->links()}}
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
