<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_subcategories =SubCategory::all();
        return view('dashboard.admin.subCategory', compact(['all_subcategories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_categories = Category::all();
        return view('dashboard.admin.addSubCategory', compact(['all_categories']));

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
            'subcategory_name' => 'required',
            'subcategory_description' => 'required',
            'subcategory_image' => 'required',
        ]);

     $input = $request->all();
     $category = Category::where('category_name', $request->category_id)->first();
     $category_name = Category::where('category_name', '=', $request->category_id );
     
     if($request->file("subcategory_image")) {
        $newImageName = time() . '-' . $request->subcategory_image->getClientOriginalName();
        $request->subcategory_image->move(public_path('admin_images'), $newImageName);
        $input['subcategory_image'] = $newImageName;
        $input['category_id'] = $category->id;
    }
        SubCategory::create($input);
        return redirect()->route('admin.subcategories.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_categories = Category::all();
        $sub_category = SubCategory::find($id);
        return view('dashboard.admin.updateSubCategory', compact(['sub_category', 'all_categories']));   
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
        $request->validate([
            'subcategory_name' => 'required',
            'subcategory_description' => 'required',
            'subcategory_image' => 'required',
            'category_id' => 'required',
        ]);
        $subCategory = SubCategory::find($id);
        $category = Category::where('category_name', $request->category_id)->first();
        $category_name = Category::where('category_name', '=', $request->category_id );
        $input = $request->all();
        if($request->file("subcategory_image")) {
            $newImageName = time() . '-' . $request->subcategory_image->getClientOriginalName();
            $request->subcategory_image->move(public_path('admin_images'), $newImageName);
            $input['subcategory_image'] = $newImageName;
            $input['category_id'] = $category->id;

        }
            $subCategory->update($input);

            return redirect()->route('admin.subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_category = SubCategory::find($id);
        $sub_category->delete();
        return redirect()->route('admin.subcategories.index');
    }
}
