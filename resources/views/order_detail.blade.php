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
          <div class="col-md-12">
              <!-- Billing Details -->
              <div class="billing-details">
                  <div class="section-title">
                      <h3 class="title">Shiping address</h3>
                  </div>
                  <div class="form-group">
                      <h5>{{$order->name}}</h5>
                  </div>
                  <div class="form-group">
                      <h5>{{$order->phone}}</h5>
                  </div>
                  <div class="form-group">
                      <h5>{{$order->address}}</h5>
                  </div>
              </div>
              <!-- /Billing Details -->
          </div>
            <div class="col-md-12">
              <div class="section-title">
                  <h3 class="title">Products</h3>
              </div>
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
                            @forelse($order->products as $prod)
                            <tr>
                                <td class="cart_product_img d-flex align-items-center">
                                    <a href="{{route('show_product', $prod->id)}}"><img style="height: 150px; width: 150px;" src="{{$prod->picture}}" alt="Product"></a>
                                    <a href="{{route('show_product', $prod->id)}}">
                                        <h6 style="display: inline">{{$prod->name}}</h6>
                                    </a>
                                </td>
                                <td class="price"><span>{{number_format($prod->price)}}</span></td>
                                <td class="qty">
                                    <span>{{$prod->pivot->quantity}}</span>
                                </td>
                                <td class="total_price"><span>{{number_format($order->total)}}</span></td>
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
            </div>
        </div>
    </div>
</div>
<!-- ****** Cart Area End ****** -->
@endsection
