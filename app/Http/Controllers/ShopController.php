<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Auth;
use DB;

class ShopController extends Controller
{
	    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$products = Product::all();
    	$userType = Auth::user()->type;

        $items = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->join('users', 'carts.user_id', '=', 'users.id')
            ->select('carts.*', 'products.name as name', 'users.email as email')
            ->get();
        $users = DB::table('users')->get();

    	if(Auth::user()->type == 'admin') {
    		return view('admin.index', compact('items', 'products', 'users'));
    	} else {
	    	return view('shop',compact('products','userType'));
    	}
    }

    public function addToCart(Request $request)
    {
    	$data = $request->all();
    	Cart::insert([
    		'product_id' => $data['productID'],
    		'user_id' => Auth::user()->id,
    		'qty' => $data['product'.$data['productID']],
    		'status' => 'added'
    	]);
    	$prdct = Product::find($data['productID']);
    	$prdct->update([
    		'qty' => $prdct->qty - $data['product'.$data['productID']]
    	]);

    	return redirect('/');
    }

    public function editProduct(Request $request){
    	Product::find($request['productID'])->update([
    		'name' => $request['name'],
    		'qty' => $request['qty'],
    		'category' => $request['category']
    	]);
    	return redirect('/');
    }

    public function removeProduct(Request $request){
    	$cartItem = Cart::find($request['itemID']);
    	$prdct = Product::find($cartItem->product_id);
    	$prdct->update([
    		'qty' => $cartItem->qty + $prdct->qty
    	]);
    	$cartItem->delete();
    	return redirect('/');
    }

    public function reserveProduct(Request $request){
        $items = Cart::where('status', 'added')->where('user_id', Auth::user()->id)->get();

        foreach ($items as $key => $item) {
            Cart::find($item->id)->update([
                'status' => 'reserved'
            ]);
        }
        return redirect('/home');
    }

}
