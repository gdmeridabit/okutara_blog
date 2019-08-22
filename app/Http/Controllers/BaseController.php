<?php


namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BaseController extends Controller
{
    public function index() {
        $posts = Posts::find(2);
        return view('welcome',['posts' => $posts, 'image' => $this->getImage($posts)]);
    }

    private function getImage($data) {
        if($data->filename != null) {
            $image = asset('storage/files/'.$data->filename);
        } 
        return $image;

    }
}
