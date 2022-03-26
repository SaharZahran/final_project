<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductUser;
use App\Models\Post;
use App\Models\Slider;
use Session;

class LandingController extends Controller
{
    public function showLandingpage()
    {
        $products = Product::all();
        $orders = ProductUser::all();
        $names = [];
        $best_seller = [];
        foreach ($products as $product) {
            foreach ($orders as $order) {
                if($product->id == $order->product_id){
                 array_push($names, $product->product_name);
                }
            }
        }
        $array_of_frequents = [];
        $array_of_best_sellers_indexs = [];
        $best_seller = [];
        $element_under_test = '';
        for($i = 0; $i < count($names); $i++){
            $counter = 0;
            $element_under_test = $names[$i];
           for($j = $i + 1; $j < count($names); $j++){
               if($names[$i] == $names[$j]){
                   $counter++;
               }
           }
           array_push($array_of_frequents, $counter);
        }
        for($i = 0; $i<4; $i++){
            array_push($array_of_best_sellers_indexs, array_search(max($array_of_frequents), $array_of_frequents));
            unset($array_of_frequents[array_search(max($array_of_frequents), $array_of_frequents)]);
        }
        foreach ($array_of_best_sellers_indexs as $best_product) {
            array_push($best_seller, Product::where('product_name', '=', $names[$best_product])->first());
        }
        $blog = Post::all();

        $landing_articles = [];
        $article_one = rand(0, count(Post::all()) - 1);
        $article_two = rand(0, count(Post::all()) - 1);
        if($article_one != $article_two){
            $landing_articles = [$blog[$article_one], $blog[$article_two]];
        }else{
            $article_two = rand(0, count(Post::all()) - 1);
            $landing_articles = [$blog[$article_one], $blog[$article_two]];
        }
        $autumn = ['10', '11', '12'];
        $winter = ['01', '02', '03'];
        $spring = ['04', '05', '06'];
        $summer = ['07', '08', '09'];
        $now = date('m');
        
        $current_season = '';
        if(in_array($now, $autumn)){
            $current_season = 'Autumn';
        } else if(in_array($now, $winter)){
            $current_season = 'Winter';
        }else if(in_array($now, $spring)){
            $current_season = 'Spring';
        }else if(in_array($now, $summer)){
            $current_season = 'Summer';
        }
        $all_products = [];
        foreach ($products as $product) {
            array_push($all_products, $product); 
        }
        $recommended_products = [];
        foreach ($all_products as $product) {
            if($product->season == $current_season){
                array_push($recommended_products, $product);
            }
        }
        $show_recommended_products = [];
        $slider = [];
        $all_sliders = Slider::all();
        for($i =0; $i<4; $i++){
            array_push($show_recommended_products, $recommended_products[rand(0, count($recommended_products) - 1)]);
        }
        $all_sliders = Slider::all(); 
        return view('dashboard.user.home', compact(['best_seller', 'landing_articles', 'show_recommended_products', 'all_sliders']));
    }
}
