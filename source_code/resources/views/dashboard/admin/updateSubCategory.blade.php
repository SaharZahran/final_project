@extends('dashboard.admin.layouts.master');
@section('pageTitle', 'Edit Sub-Category');
@section('content')
<div class="col-lg-6 addCategory__form">
    <div class="card">
        <div class="card-header">Edit Sub-Category</div>
        <div class="card-body card-block">
            <form action={{ route('admin.subcategories.update', $sub_category->id) }} method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Sub-Category Name</div><br>
                        <input type="text" value='{{ $sub_category->subcategory_name}}' name="subcategory_name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Sub-Category Description</div>
                        <input type="text" value='{{ $sub_category->subcategory_description }}' name="subcategory_description" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <img src="{{ asset("admin_images/$sub_category->subcategory_image")}}" alt="{{ $sub_category->subcategory_name }} ">
                    <div class="input-group">
                        <div class="input-group-addon">Category Image</div>
                        <input type="file" id="category_image" value='{{ $sub_category->category_image }}' name="subcategory_image" class="form-control" required>
                    </div>
                </div>
                <select name="category_id">
                    <option>Select Category</option>
                  @foreach ($all_categories as $category)
                      <option>{{ $category->category_name }}</option>
                  @endforeach
                </select>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Update Sub-Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection