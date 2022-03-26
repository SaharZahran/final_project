@extends('dashboard.admin.layouts.master');
@section('pageTitle', 'Add Sub-Category');
@section('content')
<div class="col-lg-6 addCategory__form">
    <div class="card">
        <div class="card-header">Add New Sub-Category</div>
        <div class="card-body card-block">
            <form action={{ route('admin.subcategories.store') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Category Name</div><br>
                        <input type="text" name="subcategory_name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Category Description</div>
                        <input type="text" name="subcategory_description" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Category Image</div>
                        <input type="file" name="subcategory_image" class="form-control" required>
                    </div>
                </div>
                <select name="category_id">
                    <option>Select Category</option>
                  @foreach ($all_categories as $category)
                      <option>{{ $category->category_name }}</option>
                  @endforeach
                </select>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Add Sub-Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection