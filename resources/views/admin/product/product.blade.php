@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">This is product</h3>
        </div>
        <div class="col-lg-12">
            <a href="{{ route('admin.addproduct') }}" title="Add Product" class="btn btn-primary"> Add Product</a>
        </div>
    </div>
@endsection