@extends('layouts.user')

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <form action="{{route('checkout_post')}}" method="post">
                @csrf
                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Shiping address</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="name" placeholder="Full Name" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="phone" name="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Address" required>
                        </div>
                    </div>
                    <!-- /Billing Details -->
                </div>

                <!-- Order Details -->
                @inject('provider', 'App\Http\Controllers\CartController')
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Your Order</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUCT</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <div class="order-products">
                            @forelse($provider::show() as $cart)
                            <div class="order-col">
                                <div><strong>{{$cart->quantity}}x</strong> {{$cart->name}}</div>
                                <div>{{$cart->price}}</div>
                            </div>
                            @empty
                            <div></div>
                            @endforelse
                        </div>
                        <div class="order-col">
                            <div>Shiping</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total">@php
                                    $total = 0;
                                    foreach($provider::show() as $cart) {
                                    $total = ($cart->price * $cart->quantity);
                                    }
                                    echo $total;
                                    @endphp
                                </strong>
                            </div>
                        </div>
                    </div>
                    <input type="submit" hidden />
                    <a href="javascript:void(0)" onclick="$('input:submit').click()" class="primary-btn order-submit">Place order</a>
                </div>
                <!-- /Order Details -->
            </form>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
