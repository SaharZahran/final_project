<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Comment;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller

    {
        public function showSubCategories($id){
            $all_categories = Category::all();
            foreach ($all_categories as $category) {
                if($category->id == $id){
                    return view('dashboard.user.category', compact(['category']));
                }
            }
        }
        public function showProducts($id){
            $subcategories =  SubCategory::all();
            $products = Product::where("subcategory_id", $id)->get();
            foreach ($subcategories as $subcategory) {
                if($subcategory->id == $id){
                    return view('dashboard.user.products', compact(['subcategory', 'products']));
                }
            }
        }

        public function showSingleProduct($id){
            $product = Product::where("id",'=', $id)->first();
            $similar__products = product::where('subcategory_id', '=', $product->subcategory_id)->offset(0)->limit(4)->get();
            $unit = '';
            $needs = false;
            if(SubCategory::find($product->subcategory_id)->category->category_name == 'Plants'){
                $unit = 'Each 2.5-Inch Pot contains 1 plant';
                $needs = true;
            }else if(SubCategory::find($product->subcategory_id)->category_name == 'Organic'){
                $unit = 'For 1 kilo';
            }else if(SubCategory::find($product->subcategory_id)->category_name == 'Seeds'){
                $unit = '100 seeds in each packet';
                $needs = true;
            }
            $all_comments = Product::find($id)->comment;
            return view('dashboard.user.product', compact(['product', 'similar__products', 'unit', 'needs', 'all_comments']));
        }  

        public function filter(Request $request){
            $products = Product::where('product_name', 'LIKE', '%'.$request->search.'%')->get();
            $search = $request->search;
            if(Product::where('product_name', 'LIKE', '%'.$request->search.'%')->get()->isEmpty()){
                $products = 'No results found!!';
            }
            return view('dashboard.user.filter_products', compact(['products', 'search']));
        }
        public function showStore($id){
          $store = Seller::find($id)->first();
          $categories = [];
          if($store->category_one !=null){
              array_push($categories, Category::where('category_name', '=', $store->category_one)->first()); 
          }
          if($store->category_two !=null){
              array_push($categories, Category::where('category_name', '=', $store->category_two)->first()); 
          }
          if($store->category_three !=null){
              array_push($categories, Category::where('category_name', '=', $store->category_three)->first()); 
          }
          if($store->category_four !=null){
              array_push($categories, Category::where('category_name', '=', $store->category_four)->first()); 
          }
          if($store->category_five !=null){
              array_push($categories, Category::where('category_name', '=', $store->category_five)->first()); 
          }
          $products = Product::where('store_id', '=', $store->id)->get();
          return view('dashboard.user.store', compact(['store', 'categories', 'products']));
        }
    }
