@extends('dashboard.admin.layouts.master');
@section('pageTitle', 'Add Post');
@section('content')
<div class="col-lg-6 addCategory__form">
    <div class="card">
        <div class="card-header">Add New Post</div>
        <div class="card-body card-block">
            <form action={{ route('admin.posts.store') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Post Title</div><br>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Post Content</div>
                        <textarea name="content" cols="45" rows="5" style="border:1px solid gray"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Post Image</div>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                </div>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Add Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection