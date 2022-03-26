@extends('dashboard.admin.layouts.master');
@section('pageTitle', 'Users');
@section('content')
   <div class="users__container">
    <h1>All users</h1>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="rs-select2--light rs-select2--md">
                <div class="dropDownSelect2"></div>
            </div>
            <div class="rs-select2--light rs-select2--sm">
                <div class="dropDownSelect2"></div>
            </div>
        </div>
        <div class="table-data__tool-right">
            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>add item</button>
            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
            </div>
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_users as $user)
                <tr class="tr-shadow">
                  <td>{{ $user->name }}</td>
                  <td>
                      <span class="block-email">{{ $user->email }}</span>
                  </td>                   
                  <td>
                      <div class="table-data-feature">
                      <a href={{"/admin/users/delete/".$user->id}}>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                          </button>
                         </a>
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