@extends('layouts.user')

@section('content')
<section class="section container">
    <div class="section-body">
        <h2 class="section-title">My Orders</h2>
        <p class="section-lead mb-5">
        </p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $value)
                <tr>
                    <th scope='row'><a href="{{route('order_detail', $value->id)}}">{{$value->id}}</a></th>
                    <td>{{$value -> created_at}}</td>
                    <td>{{$value -> product_name}}</td>
                    <td>{{$value -> total}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
