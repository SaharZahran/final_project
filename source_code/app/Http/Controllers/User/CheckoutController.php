<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Address;
use App\Models\Order;
use App\Models\ProductUser;
use Illuminate\Support\Facades\Auth;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_items = Session::get(Auth::guard()->user()->id.'products');
        // Session::flush();
        $current_user_cart = [];
        $all_products = Product::all();
        $total = 0;

        if($all_items == null){
            $all_items = 'No items in your cart';
            return view('dashboard.user.checkout', compact(['all_items']));
        }else{
            foreach ($all_items as $item) {
                $total +=$item['total_price'];
            }
            return view('dashboard.user.checkout', compact(['all_products', 'all_items', 'total']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_items = Session::get(Auth::guard()->user()->id.'products');
        $current_user_cart = [];
        $all_products = Product::all();
        $total = 0;
        foreach ($all_items as $item) {
            $total +=$item['total_price'];
        }
        $previous_user = false;
        $user_address_info = false;
        if(Address::where('user_id', '=', Auth::guard()->user()->id)->get()->isEmpty()){
            return view('dashboard.user.delivery_Address', compact(['all_products', 'all_items', 'total', 'user_address_info', 'previous_user']));
        }else{
            $user_address_info = Address::where('user_id', '=', Auth::guard()->user()->id)->get()[0];
            $previous_user = true;
            return view('dashboard.user.delivery_Address', compact(['all_products', 'all_items', 'total', 'user_address_info', 'previous_user']));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->previous_user == false){
            $request->validate([
                'city' => 'required',
                'street' => 'required',
                'building_no' => 'required',
                'phone'=>'required|regex:/(07)[7-9]{1}[0-9]{7}/'
            ]);
            $input = $request->all();
            $input['user_id'] = Auth::guard()->user()->id;
            Address::create($input);
        }
        $order = new Order;
        $order['user_id'] = Auth::guard()->user()->id;
        $order->save();
        foreach (Session::get(Auth::guard()->user()->id.'products') as $item) {
            $item['order_id'] = $order->id;
            ProductUser::create($item);
            Session::forget(Auth::guard()->user()->id.'products');
            Session::forget('cart_items');
        }
        Alert::success('Success', 'Your order has been sent successfully');
        return redirect()->route('showLandingpage');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(Session::get(Auth::guard()->user()->id.'products'));
        // if(Session::has(Auth::guard()->user()->id.'products')){
        //     Session::push(Auth::guard()->user()->id.'products', $input);
        // }else{
        //     Session::put(Auth::guard()->user()->id.'products', []);
        //     Session::push(Auth::guard()->user()->id.'products', $input);
        // }
        // if(Session::has('cart_items')){
        //     Session::put('cart_items', Session::get('cart_items')-1);
        // }else{
        //     Session::forget('cart_items');
        // }
           return redirect()->route('showLandingpage');
       }
}
