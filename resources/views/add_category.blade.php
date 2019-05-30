@extends('layouts.layout')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Category</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{route('category')}}">Category</a></div>
            <div class="breadcrumb-item">{{$cat != null ? 'Update' : 'Create'}}</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">{{$cat != null ? 'Update Category' : 'Create Category'}}</h2>
        <p class="section-lead mb-5">
        </p>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Thêm thành công</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(session('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Thêm Thất bại</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form action="{{route('save_category')}}" method="post" class="form-group">
          @csrf
            <fieldset>
                <input type="text" name="id" hidden value="{{$cat != null ? $cat -> id : ''}}" />
                <div class="row mt-md-2">
                    <div class="col-md-2">
                        <label for="name">Tên sản phẩm</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" value="{{$cat != null ? $cat -> name : ''}}" required />
                    </div>
                </div>
                <button type="submit" class="btn btn-info mt-2 float-right">Lưu</button>
            </fieldset>
        </form>
    </div>
</section>
@endsection
