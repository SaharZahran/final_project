@extends('dashboard.admin.layouts.master');
@section('pageTitle', 'Products');
@section('content')
   <div class="users__container">
    <h1>Our Stores</h1>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Desc.</th>
                    <th>Image</th>
                    <th>Store</th>
                </tr> 
            </thead>
            <tbody>
                @foreach ($all_products as $product)
                <tr class="tr-shadow">
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->product_price }}</td>  
                  <td>{{ $product->product_description }}</td>  
                  <td><img src={{ asset('products_images/'.$product->product_image) }} alt={{ $product->product_name }}></td>                   
                  <td>{{ $product->store->company_name }}</td>
              </tr>
              <tr class="spacer"></tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection