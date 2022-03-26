@extends('dashboard.user.layouts.master')
@section('pageTitle', 'User|Home')
@section('content')
<div class="home-container">
    <main class="userHome__container">
        <section class="homepage__sliders" id="sliders">
           @foreach ($all_sliders as $slider)
           <div class="slider slider{{ $slider->id }}">
            <i class="fa-solid fa-circle-arrow-left"></i>
               <div class="slider__text">
                   <div>
                       <p class="slider__text_paragraph">{{ $slider->text }}</p>
                       <button><a href={{ route('categoryFilter', ['id' => $slider->category_id]) }}>Shop Now</a></button>
                    </div>
                </div>
            <i class="fa-solid fa-circle-arrow-right"></i>
           </div>
           @endforeach
       </section>
        <h2 class="userHome__title">Welcome to Green Market</h2>
        <p class="userHome__description">Change your life with us, eat and grow organically</p>
        <section class="categories__container">
            <section class="col-one">
                <a href={{ route('categoryFilter', ['id' => 4]) }}>
                    <div class="userHome__singleCategory">
                        <img src={{ asset('admin_images/1646898814-indoor_category.jpg') }} alt="indoor plants category">
                        <h3>Indoor Plants</h3>
                    </div>
                </a>
                <a href={{ route('categoryFilter', ['id' => 5]) }}>
                    <div class="userHome__singleCategory">
                        <img src={{ asset('admin_images/1646898840-supplies_category.jpg') }} alt="Garden Tools">
                        <h3>Garden Tools</h3>
                    </div>
                </a>
            </section>
            <section class="col-two">
                <a href={{ route('categoryFilter', ['id' => 2]) }}>
                    <div class="userHome__singleCategory">
                        <img src={{ asset('admin_images/1646898456-seeds_category.jfif') }} alt="Seeds Category">
                        <h3>Seeds</h3>
                    </div>
                </a>
                <a href={{ route('categoryFilter', ['id' => 3]) }}>
                    <div class="userHome__singleCategory">
                        <img src={{ asset('admin_images/1646898540-plants_category.jpg') }} alt='Plants category'>                   
                        <h3>Plants</h3>
                    </div>
                </a>
                </section>
            <section class="col-three">
                <a href="{{ route('categoryFilter', ['id' => 1]) }}">
                    <div class="userHome__singleCategory organic__category">
                        <img src={{ asset('admin_images/1646898379-organic_category.jfif') }} alt="organic category">
                        <h3>Organic</h3>
                    </div>
                </a>
            </section>
        </section>
        <h2 class="userHome__title">Best Seller</h2>
        <p class="best_seller_desc">Our customers love these products</p>
        <section class="best_seller">
            @foreach ($best_seller as $best_product)
            <div class="card">
                <img class="product__image" src='{{ asset('products_images/'.$best_product->product_image) }}' alt={{ $best_product->product_name }} style="width:100%">
                <h3>{{ $best_product->product_name }}</h3>
                <p class="price">{{ $best_product->product_price }} jd</p>
                <p class="best_seller_description">{{ $best_product->product_description  }}</p>
                <p class="button"><button><a href={{ route('showProduct', ['id' => $best_product->id]) }}>Shop Now</a></button></p>
              </div>
            @endforeach
        </section>
        <h2 class="userHome__title">Know More Before Start Growing</h2>
        <section class="blog_articles">
            @foreach ($landing_articles as $article)
            <div class="article">
                <img src={{ asset('admin_images/'.$article->image) }} alt={{ $article->title }}>
                <p>{{ $article->title }}</p>
                <button><a href={{ route('blog.show', $article->id) }}>Read More</a></button>
            </div>
            @endforeach
        </section>
        <h2 class="userHome__title">This Month We Recommended</h2>
        <section class="recommended_products">
            @foreach ($show_recommended_products as $product)
            <div class="card">
                <img class="product__image" src={{ asset('products_images/'. $product->product_image) }} alt={{ $product->product_name }} style="width:100%">
                <h1>{{ $product->product_name }}</h1>
                <p class="price">{{ $product->product_price }} jd</p>
                <p class="button"><button><a href={{ route('showProduct', ['id' => $product->id]) }}>Add to Cart</a></button></p>
              </div>
            @endforeach
        </section>
    </main>
</div>
@endsection