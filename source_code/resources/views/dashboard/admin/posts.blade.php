@extends('dashboard.admin.layouts.master');
@section('pageTitle', 'Posts');
@section('content')
   <div class="users__container">
    <h1>All Posts</h1>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
        </div>
        <div class="table-data__tool-right">
            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i><a class="addCategory__btn" href={{ route('admin.posts.create') }}>Add Post</a></button>
            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                <div class="dropDownSelect2"></div>
            </div>
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_posts as $post)
                <tr class="tr-shadow">
                  <td class="post__name">{{ $post->title }}</td>
                  <td class="post_content">{{ $post->content }}</td>                   
                  <td>
                      <img src="{{ asset("admin_images/$post->image")}}" alt={{ $post->image }}>
                  </td>                   
                                 
                  <td>
                        <div class="table-data-feature">
                            <form action="{{route("admin.posts.destroy",$post->id)}}" method="POST">
                                @csrf
                                @method("delete")
                                <button type="submit" class="item mr-2" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            </form>
                        </div>
                  </td>
              </tr>
              <tr class="spacer"></tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection