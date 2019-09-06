<?php

namespace App\Http\Controllers;

use App\PostCategorize;
use App\Posts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $posts = Posts::where('user_id', Auth::id())->paginate(5);
        return view('home',['posts' => $posts]);
    }

    public function deletePost($id)
    {
        $post = Posts::find($id);
        if (!$post->delete()) {
            return back()->with('delete_failed', 'Opps! something went wrong');
        } else {
            return back()->with('delete_success', 'Successfully deleted a post!');
        }
    }
}
