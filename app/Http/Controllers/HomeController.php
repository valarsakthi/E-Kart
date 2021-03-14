<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
       $data1 = Category::select('id','name')->get();
        return view('home',['data1'=>$data1]);
        // return view('home');
    }
    public function adminHome()
    {
        $data1 = Category::select('id','name')->get();
        return view('adminHome',['data1'=>$data1]);
    }
}
