@extends('dashboard.admin.layouts.master');
@section('pageTitle', 'Stores');
@section('content')
   <div class="users__container">
    <h1>Our Stores</h1>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Company Email</th>
                    <th>Company Phone</th>
                    <th>Company Grower Method</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_sellers as $seller)
                <tr class="tr-shadow">
                  <td>{{ $seller->company_name }}</td>
                  <td>
                      <span class="block-email">{{ $seller->company_email }}</span>
                  </td>  
                  <td>{{ $seller->phone }}</td>                   
                  <td><a href='{{ asset('admin_sellers_files/'.$seller->grower_method) }}' target='_blank'>Open PDF</a></td>                 
                  <td>
                      <div class="table-data-feature">
                        <form action="{{route("admin.stores.destroy",$seller->id)}}" method="POST">
                            @csrf
                            @method("delete")
                            <button type="submit" class="item mr-2" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                        </form>
                      </div>
                  </td>
              </tr>
              <tr class="spacer"></tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection