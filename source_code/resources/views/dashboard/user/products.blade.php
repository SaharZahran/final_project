@extends('dashboard.user.layouts.master')
@section('pageTitle', 'Seller|Sub-Category')
@section('content')
<div class="products__container">
    <h1>{{ $subcategory->subcategory_name }}</h1>
    <p class="subcategory__desc">{{ $subcategory->subcategory_description }}</p>
    <section class="all_products">
        @foreach ($products as $product)
        <div class="card">
            <img class="product__image" src='{{ asset('products_images/'.$product->product_image) }}' alt={{ $product->product_name }} style="width:100%">
            <h2>{{ $product->product_name }}</h2>
            <p class="price">{{ $product->product_price }} JD</p>
            <p>{{ $product->store->company_name }}</p>
            <p class="button"><button><a href={{ route('showProduct', ['id' => $product->id]) }}>Shop now</a></button></p>
          </div>
        @endforeach
    </section>
</div>
@endsection