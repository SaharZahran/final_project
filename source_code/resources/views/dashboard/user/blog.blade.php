@extends('dashboard.user.layouts.master')
@section('pageTitle', 'Blog')
@section('content')
        <div class="blog__container">
            <h1>Our Blog</h1>
            <p class="blog__description">Here you will find many articles and books that will help you in your journey to build the garden that you dream</p>
            <div class="blog__container">
                @foreach ($all_posts as $post)
                <div class="post__container">
                    <img src={{ asset('admin_images/'.$post->image) }} alt={{ $post->title }}>
                    <div>
                        <h3 class="post__date">{{ $post->created_at }}</h3>
                        <h2>{{ $post->title }}</h2>
                        <p class="blog__postParagraph">{{ $post->content }}</p>
                        <button><a href={{ route('blog.show', $post->id) }}>Read More</a></button>
                    </div>
                </div>  
                @endforeach
            </div>
        </div>
@endsection