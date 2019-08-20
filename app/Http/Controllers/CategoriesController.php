<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
        $categories = Categories::all();
        return view('category', ['categories' => $categories]);
    }

    public function list($id)
    {
        $category = Categories::where('id', $id)->get();
        return view('post_list',['category' => $category]);
    }
}
