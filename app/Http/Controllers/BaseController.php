<?php


namespace App\Http\Controllers;

use App\Likes;
use App\PostCategorize;
use App\Posts;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class BaseController extends Controller
{
    public function index($locale) {
        app()->setLocale($locale);
        $posts = Posts::withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->take(3)
            ->get();
        Log::debug($posts);
        return view('welcome', ['posts' => $posts, 'image' => $this->getImage($posts)]);
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
