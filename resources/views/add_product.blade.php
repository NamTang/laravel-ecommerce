@extends('layouts.layout')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Product</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{route('product')}}">Product</a></div>
            <div class="breadcrumb-item">{{$prod != null ? 'Update' : 'Create'}}</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">{{$prod != null ? 'Update Product' : 'Create Product'}}</h2>
        <p class="section-lead">
        </p>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{$prod != null ? 'Updated' : 'Created'}}</strong>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(session('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Opps something wrong happened!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form action="{{route('save_product')}}" method="post" class="form-group">
            @csrf
            <fieldset>
                <input type="text" name="id" hidden value="{{$prod != null ? $prod -> id : ''}}" />
                <div class="row mt-md-2">
                    <div class="col-md-2">
                        <label for="name">Product's Name</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" value="{{$prod != null ? $prod -> name : ''}}" required/>
                    </div>
                </div>
                <div class="row mt-md-2">
                    <div class="col-md-2">
                        <label for="name">Short Description</label>
                    </div>
                    <div class="col-md-10">
                        <textarea type="text" name="shortDescription" class="form-control" value="{{$prod != null ? $prod -> shortDescription : ''}}"></textarea>
                    </div>
                </div>
                <div class="row mt-md-2">
                    <div class="col-md-2">
                        <label for="name">Description</label>
                    </div>
                    <div class="col-md-10">
                        <textarea type="text" name="description" class="form-control" value="{{$prod != null ? $prod -> description : ''}}" required></textarea>
                    </div>
                </div>
                <div class="row mt-md-2">
                    <div class="col-md-2">
                        <label for="name">Quantity</label>
                    </div>
                    <div class="col-md-10">
                        <input type="number" name="quantity" class="form-control" value="{{$prod != null ? $prod -> quantity : ''}}" required/>
                    </div>
                </div>
                <div class="row mt-md-2">
                    <div class="col-md-2">
                        <label for="name">Price</label>
                    </div>
                    <div class="col-md-10">
                        <input type="number" name="price" class="form-control" value="{{$prod != null ? $prod -> price : ''}}" required/>
                    </div>
                </div>
                <div class="row mt-md-2">
                    <div class="col-md-2">
                        <label for="name">Category</label>
                    </div>
                    <div class="col-md-10">
                        <select name="catId" class="form-control" value="{{$prod != null ? $prod -> catId : ''}}" required>
                            @foreach ($cats as $value)
                                <option value="{{$value -> id}}">{{$value -> name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-md-2">
                    <div class="col-md-2">
                        <label for="name">Picture Url</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="picture" class="form-control" value="{{$prod != null ? $prod -> picture : ''}}" required/>
                    </div>
                </div>
                <button type="submit" name="btnSubmit" class="btn btn-info mt-3 float-right">Lưu</button>
            </fieldset>
        </form>
    </div>
</section>
@endsection
