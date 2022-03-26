@extends('dashboard.user.layouts.master')
@section('pageTitle', 'Seller|Category')
@section('content')
<div class="category__bigContainer">
    <div class="category__allSubcategories">
        <h1>{{ $category->category_name}} Category</h1>
        <p class="category__description">{{ $category->category_description}} </p>
        <section class="category__innerContainer">
            @foreach ($category->subcategory as $subcategory)
            <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="flip-card-front">
                    <div class="singleSubcategory">
                        <img style="width:300px;height:300px;" src={{ asset('admin_images/'.$subcategory->subcategory_image) }} alt={{ $subcategory->subcategory_name }}>
                    </div>
                  </div>
                  <div class="flip-card-back">
                    <h2>{{ $subcategory->subcategory_name }}</h2>
                    <p>{{ $subcategory->subcategory_description }}</p>
                    <button><a href={{ route('subcategoryFilter', ['id' => $subcategory->id]) }}>Show Products</a></button>
                  </div>
                </div>
              </div>
            @endforeach
        </section>
    </div>
</div>
@endsection