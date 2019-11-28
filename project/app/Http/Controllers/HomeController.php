<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Role;

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
        
        if(Auth::user()) {
            $user = Auth::user();
            $role = Role::All();
            // $role = Auth::user()->role; 
            return view('home', compact('role', 'user'));
         } else {
             return view('home');
         }
    }
}
