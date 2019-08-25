<?php


namespace App\Http\Controllers;

use App\Likes;
use App\Posts;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BaseController extends Controller
{
    public function index() {
        Log::debug(Posts::withCount('likes')->take(1)->get());
        $posts = Posts::withCount('likes')->take(5)->get();
        return view('welcome',['posts' => $posts[0], 'image' => $this->getImage($posts)]);
    }

    private function getImage($data) {
        try{
            if($data->filename != null) {
                $image = asset('storage/files/'.$data->filename);
            }
            return $image;
        } catch (\Exception $e) {
            return '';
        }
    }
}
