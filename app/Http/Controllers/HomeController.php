<?php

namespace App\Http\Controllers;
use Auth;
use App\Cart;
use App\Product;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
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

        $items = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->join('users', 'carts.user_id', '=', 'users.id')
            ->select('carts.*', 'products.name as name', 'users.email as email')
            ->where('carts.user_id', Auth::user()->id)
            ->get();
        $userType = Auth::user()->type;

        if(Auth::user()->type == 'admin'){
            return redirect('/');
        } else {
            return view('customer.index', compact('items'));
        }
    }
}
