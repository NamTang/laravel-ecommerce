@extends('layouts.layout')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Product</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{route('product')}}">Product</a></div>
            <div class="breadcrumb-item">Create</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Tables</h2>
        <p class="section-lead">
            Examples for opt-in styling of tables (given their prevalent use in JavaScript plugins) with Bootstrap.
        </p>
    </div>
</section>
@endsection
