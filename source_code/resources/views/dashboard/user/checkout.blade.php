@extends('dashboard.user.layouts.master')
@section('pageTitle', 'User|Checkout')
@section('content')
<div class="checkout__container">
        <h1 class="checkout__title">Shopping Cart</h1>
        @if ($all_items !== 'No items in your cart')
        <div class="checkout__innerContainer">
            <div class="checkout__container--left">
                <table>
                    <thead>
                        <tr class="checkout__tableRow">
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_items as $item)
                        <tr class="checkout__tableRow">
                            <td>
                                @foreach ($all_products as $product)
                                @if ($product->id == $item['product_id'])
                                    {{ $product->product_name }}
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($all_products as $product)
                                @if ($product->id == $item['product_id'])
                                    <img class="checkout__images" src='{{ asset('products_images/'.$product->product_image) }}' alt="">
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($all_products as $product)
                                @if ($product->id == $item['product_id'])
                                    {{ $product->product_price }}
                                @endif
                                @endforeach
                            </td>
                            <td><i class="fa fa-plus"></i> {{ $item['quantity'] }} <i class="fa fa-minus"></i></td>
                            <td>{{ $item['total_price'] }} Jd</td>
                            <td><a href={{ route('user.checkout.destroy', $product->id) }}><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="checkout__container--right">
                <div class="innerBlock">
                    <h2>Order Summery</h2>
                    <h3>Total: {{ $total }} JD</h3>
                </div>
                <button><a href="{{ route('user.checkout.create')}}">Checkout</a></button>
            </div>
        </div>
        @else
            <p>No items in your cart</p>
        @endif
    </div>
@endsection