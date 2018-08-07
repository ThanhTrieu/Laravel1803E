@extends('admin.layout')

@section('content')
    <form action="{{ route('admin.product.handleadd') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="namePd">Name</label>
                    <input type="text" name="name" id="namePd" class="form-control">
                </div>
                <div class="form-group">
                    <label for="slcCat">Categories</label>
                    <select  class="form-control" id="slcCat" name="cat_id">
                        <option value="1">Thoi Trang Cong So</option>
                        <option value="2">Thoi Trang Cong So</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="slcSize">Sizes</label>
                    <select class="form-control" id="slcSize" name="size_id">
                        <option value="1">M</option>
                        <option value="2">XL</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pricePd">Price</label>
                    <input type="text" name="price" id="pricePd" class="form-control">
                </div>
                <div class="form-group">
                    <label for="salePd">Sale off</label>
                    <input type="text" name="sale" id="salePd" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="qtyPd">QTY</label>
                    <input type="text" name="qty" id="qtyPd" class="form-control">
                </div>
                <div class="form-group">
                    <label for="imagePd">Image Pd</label>
                    <input type="file" name="image" id="imagePd" class="form-control">
                </div>
                <div class="form-group">
                    <label for="imagePd">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="8"></textarea>
                </div>
            </div>
            <div class="col-md-6 offset-md-3">
                <button type="submit" class="btn btn-primary btn-block"> Add Product</button>
            </div>
        </div>
    </form>
@endsection