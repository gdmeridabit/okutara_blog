<?php


namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BaseController extends Controller
{
    public function index() {
        $posts = Posts::all();
        return view('welcome',['posts' => $posts]);
    }
}
