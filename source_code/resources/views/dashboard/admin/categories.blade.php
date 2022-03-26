@extends('dashboard.admin.layouts.master');
@section('pageTitle', 'Categories');
@section('content')
   <div class="users__container">
    <h1>All categories</h1>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
        </div>
        <div class="table-data__tool-right">
            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i><a class="addCategory__btn" href={{ route('admin.categories.create') }}>Add Category</a></button>
            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                <div class="dropDownSelect2"></div>
            </div>
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Desc.</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_categories as $category)
                <tr class="tr-shadow">
                  <td class="category__name">{{ $category->category_name }}</td>
                  <td>
                      <span class="block-email">{{ $category->category_description }}</span>
                  </td>                   
                  <td>
                      <img src="{{ asset("admin_images/$category->category_image")}}" alt={{ $category->category_name }}>
                  </td>                   
                                 
                  <td>
                        <div class="table-data-feature">
                            <form action="{{route("admin.categories.destroy",$category->id)}}" method="POST">
                                @csrf
                                @method("delete")
                                <button type="submit" class="item mr-2" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            </form>
                            <a href="{{route("admin.categories.edit",$category->id)}}">
                                <button class="item mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
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