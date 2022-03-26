@extends('dashboard.admin.layouts.master');
@section('pageTitle', 'Edit Category');
@section('content')
<div class="col-lg-6 addCategory__form">
    <div class="card">
        <div class="card-header">Edit Category</div>
        <div class="card-body card-block">
            <form action={{ route('admin.categories.update', $editedCategory->id) }} method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Category Name</div><br>
                        <input type="text" id="category_name" value='{{ $editedCategory->category_name}}' name="category_name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Category Description</div>
                        <input type="text" id="category_description" value='{{ $editedCategory->category_description }}' name="category_description" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <img src="{{ asset("admin_images/$editedCategory->category_image")}}" alt="{{ $editedCategory->category_name }} ">
                    <div class="input-group">
                        <div class="input-group-addon">Category Image</div>
                        <input type="file" id="category_image" value='{{ $editedCategory->category_image }}' name="category_image" class="form-control" required>
                    </div>
                </div>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection