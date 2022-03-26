<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $all_categories = Category::all();
        return view('dashboard.admin.categories', compact(['all_categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.admin.addCategory');
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
            'category_name' => 'required',
            'category_description' => 'required',
            'category_image' => 'required',
        ]);

     $input = $request->all();

     if($request->file("category_image")) {
        $newImageName = time() . '-' . $request->category_image->getClientOriginalName();
        $request->category_image->move(public_path('admin_images'), $newImageName);
        $input['category_image'] = $newImageName;
     }
        Category::create($input);
        return redirect()->route('admin.categories.index');
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
        $editedCategory = Category::find($id);
        return view('dashboard.admin.updateCategory', compact(['editedCategory']));
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
            'category_name' => 'required',
            'category_description' => 'required',
            'category_image' => 'required',
        ]);
     $Category = Category::find($id);
     $input = $request->all();
     if($request->file("category_image")) {
        $newImageName = time() . '-' . $request->category_image->getClientOriginalName();
        $request->category_image->move(public_path('admin_images'), $newImageName);
        $input['category_image'] = $newImageName;
     }
        $Category->update($input);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $deleted_Category =  Category::find($id);
       $deleted_Category->delete();
       return redirect()->route('admin.categories.index');
    }
}
