@extends('dashboard.seller.layouts.master')
@section('pageTitle', 'Seller Home')
@section('content')
<div class="sellerHome__container">
    <h1>{{ Auth::guard()->user()->company_name }} Shop</h1>
    <img class="hero_image" src='{{asset('admin_images/'.Auth::guard()->user()->hero_image)}}' alt= {{ Auth::guard()->user()->company_name }} >
        <div class="sellerHome__innerContainer">
            <div class="sellerHome__categories">
                <ul>
                    <li class="sellerHome__secondTitle">{{ Auth::guard()->user()->company_name }} Categories</li>
                    @foreach ($all_store_categories as $category)
                        <li class="store__mainCategory"><a href={{ route('seller.shop.index') }}>{{ $category }}</a>
                        </li>
                            <ul>
                                @foreach ($all_store_subcategories as $subcategory)
                                    @if ($subcategory->category->category_name === $category)
                                        <li class="store__category"><a href="{{ route('seller.filter', ['idValue'=>$subcategory->id])}}">{{ $subcategory->subcategory_name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                    @endforeach
                </ul>
            </div>
            <div class="sellerHome__products">
                <div class="sellerHome__top">
                    <button class="store__addProductBtn"><a href={{ route('seller.shop.create') }}>Add New Product</a></button>
                </div>
                <div class="sellerHome__middle">
                    @foreach ($all_products as $product)
                    <div class="card">
                        <img class="product_image" src={{ asset('products_images/'.$product->product_image) }} alt={{ $product->product_name }}>
                        <h3>{{ $product->product_name }}</h3>
                        <p class="price">{{ $product->product_price }} JD</p>
                        <p class="button"><button><a href="">Shop now</a></button></p>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>
@endsection