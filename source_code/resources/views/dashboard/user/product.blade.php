@extends('dashboard.user.layouts.master')
@section('pageTitle', 'Seller|Single Product')
@section('content')
        <div class="big__container">
                <div class="product__container">
                        <div class="product__container--left">
                                <img class='singlepage__image' src={{ asset('products_images/'.$product->product_image) }} alt={{ $product->product_name }}>
                        </div>  
                        <div class="product__container--right">
                                <h1>{{ $product->product_name }}</h1>
                                <h4><a class="product__storeName" href={{ route('showStore', ['id' => $product->store->id]) }}>{{ $product->store->company_name }}</a></h4>
                                <h2 class="singleproduct__price">{{ $product->product_price }} JD</h2>
                                <p>{{ $product->product_description }}</p>
          
                                <form action={{ route('user.order.store') }} method="post" enctype="multipart/form-data">
                                        @csrf
                                          <label for="quantity">Quantity</label>
                                          <input class="singlepage__quantity" type="text" name='quantity' id="quantity" required>
                                          <input type="text" hidden name='product_id' value={{ $product->id }}>
                                          <input type="text" hidden name='product_price' value={{ $product->product_price }}>
                                          <button type="submit">Add to Cart</button><br>
                                          <label class="singlepage__unit">{{ $unit }}</label>
                                          <hr>
                                          @if ($needs == true)
                                          <div class="singlepage__plantNeeds">
                                                <h5>This plant needs: </h5>  
                                                <img src={{ asset('homepage_files/sun.png') }} alt="plant need sun">                                              
                                                <img src={{ asset('homepage_files/drop.png') }} alt="plant need water">                                              
                                          </div>
                                          @endif

                                </form>
                        </div>  
                  </div>
                  <section class="comment__section">
                          <h2 class="comment__section--title">Customers Comments</h2>
                          <form action={{ route('user.comments.store') }} method="post" class="comments__form--add">
                                @csrf
                                <textarea name="comment_text" placeholder="Write something about this product"></textarea><br>
                                <input type="text" hidden name='product_id' value={{ $product->id }}> 
                                <button type="submit">Write Comment</button>
                          </form>
                          <section class="all_comments">
                                @if ($all_comments != null)
                                <ul>
                                        @foreach ($all_comments as $comment)
                                        <li>
                                           <p class="comments__date">{{ $comment->created_at }}</p>
                                           <h4><img class="comments__userImage" src={{ asset('homepage_files/user.png') }} alt="user"> {{ $comment->user->name}}</h5>
                                           <p class="comment__text"><span>Comment:</span> {{ $comment->comment_text }}</p>
                                        </li>
                                        <br>
                                        @endforeach
                                </ul>
                                @endif
                          </section>
                  </section>
                  <div class="similar__products">
                          <h2 class="similarProducts__title">You May Also Like</h2>
                          <section class="allSimilar__products">
                                  @foreach ($similar__products as $product)
                                  <div class="card">
                                        <img src={{ asset('products_images/'.$product->product_image) }} alt={{ $product->product_name }} style="width:100%">
                                        <h2>{{ $product->product_name }}</h2>
                                        <p class="price">{{ $product->product_price }} JD</p>
                                        <p class="similarproduct__desc">{{ $product->product_description }}</p>
                                        <p><button><a href="{{ route('showProduct', ['id' => $product->id]) }}">Shop now</a></button></p>
                                      </div>
                                  @endforeach
                          </section>
                  </div>

        </div>

        
@endsection