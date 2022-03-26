@extends('dashboard.user.layouts.master')
@section('pageTitle', 'Store')
@section('content')
<div class="userHome__container">
    <h1 class="store__title">{{ $store->company_name }} Shop</h1>
    <img class="hero_image" src='{{asset('admin_images/'.$store->hero_image)}}' alt= {{ $store->company_name }} >
        <div class="store__innerContainer">
            <div class="store__categories">
                <ul>
                    <li class="store__secondTitle">{{ $store->company_name }} Categories</li>
                    @foreach ($categories as $category)
                        <li class="store__mainCategory"><a href={{ route('categoryFilter', ['id' => $category->id]) }}>{{ $category->category_name }}</a>
                        </li>
                            <ul>
                                @foreach ($category->subcategory as $subcategory)
                                    <li class="store__subcategory"><a href="{{ route('subcategoryFilter', ['id' => $subcategory->id])}}">{{ $subcategory->subcategory_name }}</a></li>
                                @endforeach
                            </ul>
                    @endforeach
                </ul>
            </div>
            <div class="store__products">
                    @foreach ($products as $product)
                    <div class="card">
                        <img class="product_image" src={{ asset('products_images/'.$product->product_image) }} alt={{ $product->product_name }} style="width:100%">
                        <h2>{{ $product->product_name }}</h2>
                        <p class="price">{{ $product->product_price }} JD</p>
                        <p class="button"><button>Shop now</button></p>
                    </div>
                    @endforeach
            </div>
        </div>
</div>
@endsection