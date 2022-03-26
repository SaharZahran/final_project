<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            array_push($all_store_categories, Auth::guard()->user()->category_four); 
        }
        if(Auth::guard()->user()->category_five){
            array_push($all_store_categories, Auth::guard()->user()->category_five); 
        }
        $all_store_subcategories = SubCategory::all();
        $all_products = Product::where('store_id', '=', Auth::guard()->user()->id)->get();
        return view('dashboard.seller.home', compact(['all_store_categories', 'all_store_subcategories', 'all_products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_subcategories = SubCategory::all();
        return view('dashboard.seller.addProduct', compact(['all_subcategories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'product_name' => 'required',
                'product_description' => 'required',
                'product_image' => 'required',
                'product_price' => 'required',
                'subcategory_id' => 'required',
            ]);
    
         $input = $request->all();
         $subcategory = DB::table('sub_categories')->where('subcategory_name', '=',$request->subcategory_id)->first();
         if($request->file("product_image")) {
            $newImageName = time() . '-' . $request->product_image->getClientOriginalName();
            $request->product_image->move(public_path('products_images'), $newImageName);
            $input['product_image'] = $newImageName;
            $input['subcategory_id'] = $subcategory->id;
            $input['store_id'] = Auth::guard()->user()->id;

        }
            Product::create($input);
            return redirect()->route('seller.shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('dashboard.seller.showProduct', compact(['product']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('dashboard.seller.updateProduct', compact(['product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $request->validate([
                'product_name' => 'required',
                'product_description' => 'required',
                'product_image' => 'required',
                'product_price' => 'required',
                'subcategory_id' => 'required',
            ]);
    
         $input = $request->all();
         $subcategory = SubCategory::where('subcategory_name', '=', $request->subcategory_id )->first();
         $product = Product::find($id);
         if($request->file("product_image")) {
            $newImageName = time() . '-' . $request->product_image->getClientOriginalName();
            $request->product_image->move(public_path('products_images'), $newImageName);
            $input['product_image'] = $newImageName;
            $input['subcategory_id'] = $subcategory->id;
            $input['store_id'] = Auth::guard()->user()->id;

        }
            $product->update($input);
            return redirect()->route('seller.shop.index');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('seller.shop.index');
    }
}
