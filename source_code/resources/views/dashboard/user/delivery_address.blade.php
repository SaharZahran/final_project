@extends('dashboard.user.layouts.master')
@section('pageTitle', 'Delivery Address')
@section('content')
<div class="deliveryAddress">
    <h1 class="deliveryAddress__title">Delivery Address</h1>
    <div class="deliveryAddress__innerContainer">
        <form action={{ route('user.checkout.store') }} method="post" enctype="multipart/form-data" class="deliveryAddress__form">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">City</div>
                    <input type="text" name="city" placeholder="ex: Az Zarqa" 
                    @if ($user_address_info)
                    value={{ $user_address_info->city }}
                    @endif
                    required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Street</div>
                    <input type="text" name="street" placeholder="ex: Army street" 
                    @if ($user_address_info)
                    value={{ $user_address_info->street }}
                    @endif
                    required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Building No.</div>
                    <input type="text" name="building_no" placeholder="ex: building no. 2 1st floor" 
                    @if ($user_address_info)
                    value={{ $user_address_info->building_no }}
                    @endif
                    required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Mobile Number</div>
                    <input type="number" name="phone" placeholder="ex: 0777777777" 
                    @if ($user_address_info)
                    value={{ $user_address_info->phone }}    
                    @endif required>
                    <div class="text-danger">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <div class="deliveryAddress__payment">
                    <div class="input-group-addon">Choose payment method</div>
                    <input type="radio" id="cash_on_delivery" name="payment_method" value="cash on delivery">
                    <label for="cash_on_delivery">Cash on Delivery</label>
                    <input type="radio" id="visa_or_mastercard" name="payment_method" value="visa or mastercard">
                    <label for="visa_or_mastercard">Visa or Mastercard</label><br><br>
                </div>
            </div>
                <input type="text" name="previous_user" 
                @if ($previous_user)
                value={{ $previous_user }}    
                @endif hidden>
                <button type="submit" class="btn btn-primary btn-sm">Checkout</button>
        </form>

        <div class="deliveryAddress__orderSummery">
            <h2>Order Summery</h2>
            <table>
                <thead>
                    <tr class="checkout__tableRow">
                        <th>Product</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
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
                                <img class="checkout__images" src='{{ asset('products_images/'.$product->product_image) }}' alt={{ $product->product_name }}>
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($all_products as $product)
                            @if ($product->id == $item['product_id'])
                                {{ $item['quantity'] * $product->product_price }}
                            @endif
                            @endforeach
                        </td>
                        <hr>
                        <td>{{ $item['total_price'] }} Jd</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="deliveryAddress__total">Total: {{ $total }} JD</div>
        </div>
    </div>
</div>
@endsection