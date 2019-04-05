<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class AdminController extends Controller
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

    public function editUser(Request $request)
    {
    	DB::table('users')->where('id',$request['userID'])->update([
    		'name' => $request['name'],
    		'email' => $request['email'],
    		'type' => $request['type']
    	]);

    	return redirect('/');

    }
}
