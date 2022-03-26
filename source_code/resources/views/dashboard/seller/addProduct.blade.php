@extends('dashboard.seller.layouts.master')
@section('pageTitle', 'Add Product')
@section('content')
<div class="addProduct__container">
    <form action='{{ route('seller.shop.store') }}' method="post" enctype="multipart/form-data">
        <h1>Add New Product</h1>
        @csrf
        <div class="form-group">
            <div class="input-group">
                <div>Product Name</div>
                <input type="text" name="product_name" class="form-control" placeholder="product name ..." required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div>Product Description</div>
                <input type="text" name="product_description" placeholder="product description" required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="">Product Image</div>
                <input type="file" name="product_image" placeholder="product image" required class="addProduct__choose">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="">Product Price</div>
                <input type="number" name="product_price" placeholder="product price ..." step="0.01" required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="">Product Season</div>
                <select name="season" id="season" required>
                    <option>When to grow it(if it is a plant/seed)</option>
                    <option>Autumn</option>
                    <option>Winter</option>
                    <option>Spring</option>
                    <option>Summer</option>
                    <option>no_season</option>
                </select>
            </div>
        </div>
        <select name="subcategory_id" class="addProduct__choose">
            <option>Select Sub-Category</option>
          @foreach ($all_subcategories as $subcategory)
              <option>{{ $subcategory->subcategory_name }}</option>
          @endforeach
        </select>
        <div class="">
            <button type="submit" class="addProduct__btn">Add Product</button>
        </div>
    </form>
</div>
@endsection