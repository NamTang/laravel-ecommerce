@extends('layouts.layout')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Product List</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
            <div class="breadcrumb-item">Product</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Product List</h2>
        <p class="section-lead mb-5">
        </p>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Xóa thành công</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(session('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Xóa Thất bại</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Controls</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prods as $value)
                <tr>
                    <th scope='row'>{{$value -> id}}</th>
                    <td><a href="{{route('add_product')}}?updateId={{$value -> id}}">{{$value -> name}}</a></td>
                    <td>{{$value -> description}}</td>
                    <td>{{$value -> quantity}}</td>
                    <td>{{$value -> price}}</td>
                    <td>{{$value -> catId}}</td>
                    <td><img class="rounded d-block" style="height: 100px;" src="{{$value -> picture}}"></td>
                    <td><form method="post" action="{{route('remove_product')}}">
                        @csrf
                        <input name="id" id="id" value="{{$value -> id}}" type="text" hidden/>
                        <button class="btn btn-white" type="submit">✖</button>
                    </form></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
