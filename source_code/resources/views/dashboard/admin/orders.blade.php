@extends('dashboard.admin.layouts.master');
@section('pageTitle', 'Orders');
@section('content')
   <div class="users__container">
    <h1>Orders</h1>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>Order id</th>
                    <th>Username</th>
                    <th>Time</th>
                    <th>Items</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_orders as $order)
                <tr class="tr-shadow">
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->user->name }}</td>  
                  <td>{{ $order->created_at }}</td>                   
                  <td>
                      <ul>
                          @foreach ($order->orderItem as $item)
                              <li>
                                  @foreach ($all_products as $product)
                                    @if ($product->id == $item->product_id)
                                        {{ $product->product_name }}
                                    @endif
                                  @endforeach
                             </li>
                          @endforeach
                      </ul>
                  </td>   
                  <td style="color:orange">Pending..</td>              
              </tr>
              <tr class="spacer"></tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection