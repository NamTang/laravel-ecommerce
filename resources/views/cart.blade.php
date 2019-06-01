@extends('layouts.user')
<style media="screen">
    .cart-table .table td,
    .cart-table .table th {
        padding: 0.75rem;
        text-align: left;
        vertical-align: middle;
        border: none;
        font-size: 13px;
    }

    .cart_area table thead {
        background-color: #f4f2f8;
        border: none;
    }

    .cart_area .update-checkout a,
    .cart_area .back-to-shop a {
        background-color: transparent;
        border-radius: 0;
        display: inline-block;
        height: 55px;
        line-height: 51px;
        min-width: 120px;
        padding: 0 30px;
        text-align: center;
        font-size: 14px;
        font-weight: 700;
        border: 2px solid #3a3a3a;
        text-transform: uppercase;
    }

    .cart_area .update-checkout a:last-child {
        background-color: orange;
        color: white;
        border-color: #f4f2f8;
    }
</style>

@section('content')
<!-- ****** Cart Area Start ****** -->
<div class="cart_area section_padding_100 clearfix" style="margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('cart_update')}}" method="post">
                    @csrf
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($carts as $cart)
                                <tr>
                                    <td class="cart_product_img d-flex align-items-center">
                                        <a href="{{route('show_product', $cart->id)}}"><img style="height: 150px; width: 150px;" src="{{$cart->picture}}" alt="Product"></a>
                                        <a href="{{route('show_product', $cart->id)}}">
                                            <h6 style="display: inline">{{$cart->name}}</h6>
                                        </a>
                                    </td>
                                    <td class="price"><span>{{number_format($cart->price)}}</span></td>
                                    <td class="qty">
                                        <div class="quantity">
                                            <input type="number" name="cartId[]" value="{{$cart->catId}}" hidden>
                                            <input type="number" class="qty-text" step="1" min="1" max="99" name="quantity[]" value="{{$cart->quantity}}">
                                        </div>
                                    </td>
                                    <td class="total_price"><span>{{number_format($cart->quantity * $cart->price)}}</span></td>
                                </tr>
                                @empty
                                <div class="col-xs-12 text-center">
                                    <div class="empty-cart">
                                        <img src="{{asset('/icon/cart-256.png')}}"></img>
                                        <p class="message">Bạn chưa chọn sản phẩm nào.</p>
                                    </div>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-footer row mt-30">
                        <div class="col-md-6 back-to-shop w-50">
                            <a href="{{route('show_store')}}">Continue shooping</a>
                        </div>
                        <div class="col-md-6 update-checkout w-50 text-right">
                            <input type="submit" hidden>
                            <a href="javascript:void(0)" onclick="$('input:submit').click()">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ****** Cart Area End ****** -->
@endsection
