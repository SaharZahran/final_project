<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Seller;
use App\Models\SubCategory;
use App\Models\Product;
class FilterController extends Controller
{
    function filter($idValue){
        $all_store_categories = [];
        if(Auth::guard()->user()->category_one){
            array_push($all_store_categories, Auth::guard()->user()->category_one); 
        }
        if(Auth::guard()->user()->category_two){
            array_push($all_store_categories, Auth::guard()->user()->category_two); 
        }
        if(Auth::guard()->user()->category_three){
            array_push($all_store_categories, Auth::guard()->user()->category_three); 
        }
        if(Auth::guard()->user()->category_four){
            push($all_store_categories, Auth::guard()->user()->category_four); 
        }
        if(Auth::guard()->user()->category_five){
            push($all_store_categories, Auth::guard()->user()->category_five); 
        }
        $all_store_subcategories = SubCategory::all();
        $products = DB::table('products')->where('store_id', '=', Auth::guard()->user()->id)->get();
        $all_products = [];
        foreach ($products as $product) {
            ($product->subcategory_id == $idValue)?array_push($all_products, $product):'';
        }
        return view('dashboard.seller.home', compact(['all_store_categories', 'all_store_subcategories', 'all_products']));
    }
}
