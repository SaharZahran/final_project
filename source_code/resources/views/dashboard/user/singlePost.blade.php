@extends('dashboard.user.layouts.master')
@section('pageTitle', 'Post')
@section('content')
        <div class="singleArticle__container">
            <h1>{{ $post->title }}</h1>
            <img src={{ asset('admin_images/'.$post->image) }} alt={{ $post->title }}>
            <p>{{ $post->content }}</p>
            <button><a href={{ route('blog.index') }}>Back to Blog</a></button>
        </div>
@endsection