@extends('layouts.layout')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Category List</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
            <div class="breadcrumb-item">Category</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Category List</h2>
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
                    <th scope="col">Controls</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cats as $value)
                <tr>
                    <th scope='row'>{{$value -> id}}</th>
                    <td><a href="{{route('add_category')}}?updateId={{$value -> id}}">{{$value -> name}}</a></td>
                    <td><form method="post" action="{{route('remove_category')}}">
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
