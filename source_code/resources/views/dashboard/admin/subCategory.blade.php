@extends('dashboard.admin.layouts.master');
@section('pageTitle', 'Sub-Categories');
@section('content')
   <div class="users__container">
    <h1>All SubCategories</h1>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
        </div>
        <div class="table-data__tool-right">
            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i><a class="addCategory__btn" href={{ route('admin.subcategories.create') }}>Add Sub-Category</a></button>
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
                    <th>Category Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_subcategories as $subcategory)
                <tr class="tr-shadow">
                  <td class="category__name">{{ $subcategory->subcategory_name }}</td>
                  <td>
                      <span class="block-email">{{ $subcategory->subcategory_description }}</span>
                  </td>                   
                  <td>
                      <img src="{{ asset("admin_images/$subcategory->subcategory_image")}}" alt={{ $subcategory->subcategory_name }}>
                  </td>                   
                  <td>
                      {{ $subcategory->category->category_name }}
                  </td>                   
                  <td>
                        <div class="table-data-feature">
                            <form action="{{route("admin.subcategories.destroy",$subcategory->id)}}" method="POST">
                                @csrf
                                @method("delete")
                                <button type="submit" class="item mr-2" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            </form>
                            <a href="{{route("admin.subcategories.edit",$subcategory->id)}}">
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