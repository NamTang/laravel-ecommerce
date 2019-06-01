@extends('layouts.layout')

@section('content')
<section class="section container">
    <div class="section-header">
        <h1>Orders</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Orders</a></div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Orders</h2>
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
                    <td>{{number_format($value -> total)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
