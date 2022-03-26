<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SellerController extends Controller
{
    function create(Request $request){
        $request->validate([
            'company_name' =>'required',
            'company_email' =>'required|email|unique:users,email',
            'password' =>'required|min:8|max:30',
            'confirm_password' =>'required|min:8|max:30|same:password',
            'phone' => 'required',
            'grower_method' => 'required',
            'hero_image' =>'required|image:jpg,jpeg,png,svg,gif,jfif|dimensions:min_width=1000,min_height=350',
            'category_one'=>'required_without_all:category_two,category_three,category_four,category_five',
            'category_two'=>'required_without_all:category_one,category_three,category_four,category_five',
            'category_three'=>'required_without_all:category_one,category_two,category_four,category_five',
            'category_four'=>'required_without_all:category_two,category_one,category_three,category_five',
            'category_five'=>'required_without_all:category_two,category_three,category_four,category_one',
        ]);
        $input = $request->all();
        if($request->file('grower_method')){
            $newFileName = time() . '-' . $request->grower_method->getClientOriginalName();
            $request->grower_method->move(public_path('admin_sellers_files'), $newFileName);
            if($request->file('hero_image')){
                $newImageName = time() . '-' . $request->hero_image->getClientOriginalName();
                $request->hero_image->move(public_path('admin_images'), $newImageName);
                $input['password'] = Hash::make($request->password);
                $input['confirm_password'] = Hash::make($request->confirm_password);
                $input['hero_image'] = $newImageName;
                $input['grower_method'] = $newFileName;
            }
        }
        Seller::create($input);
        Alert::success('Success', 'You have been registered successfully');
        return view('dashboard.seller.home');
       }
   
       function check(Request $request){
           $request->validate([
               'company_email' =>'required|email|exists:sellers,company_email',
               'password' =>'required|min:8|max:30'
           ],[
               'company_email.exists' =>'This email does not exist! check it again!'
           ]);
           $creds = $request->only('company_email','password');

           if( Auth::guard('seller')->attempt($creds) ){
               Alert::success('Welcome Back', 'Have a great day with us!');
               return redirect()->route('seller.shop.index');
           }else{
               return redirect()->route('seller.login')->with('fail','Incorrect credentials');
           }
       }

       function logout(){
           Auth::guard('seller')->logout();
           return redirect('/');
       }
}
