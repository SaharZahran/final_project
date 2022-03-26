@extends('dashboard.admin.layouts.master');
@section('pageTitle', 'Add Category');
@section('content')
<div class="col-lg-6 addCategory__form">
    <div class="card">
        <div class="card-header">Add New Category</div>
        <div class="card-body card-block">
            <form action={{ route('admin.categories.store') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Category Name</div><br>
                        <input type="text" id="category_name" name="category_name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Category Description</div>
                        <input type="text" id="category_description" name="category_description" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Category Image</div>
                        <input type="file" id="category_image" name="category_image" class="form-control" required>
                    </div>
                </div>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection