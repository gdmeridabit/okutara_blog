<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Likes;
use App\Posts;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Categories::all();
        return view('post_create', ['categories' => $categories]);
    }

    /**
     * Posts Creation
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        Log::debug($request->description);
        $this->validateForm($request);
        $post = new Posts();
        $user = Auth::user();
        $name = '';
        if ($files = $request->file('fileToUpload')) {
            $name = $request->username . date("Ymdhis") . '.' . $files->getClientOriginalExtension();
        }

        $this->embedYoutube($request->link);
        $post->title = $request->title;
        $post->filename = $name;
        $post->description = $request->description;
        $post->user_id = $user->id;
        $post->link = is_null($request->link) ? '' : $this->embedYoutube($request->link);
        $result = $post->save();

        if (!$result) {
            return back()->with('create_failed', 'Opps! something went wrong');
        } else {
            $post->categories()->sync($request->categories);
            Storage::disk('local')->putFileAs(
                'public/files/',
                $files,
                $name
            );
            return redirect()->route('dashboard');
        }
    }

    private function embedYoutube($link)
    {
        $match = preg_match("/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/", $link, $matches);
        Log::debug($matches[2]);
        if($match && strlen($matches[2]) == 11) {
            return 'https://www.youtube.com/embed/' . $matches[2];
        }
    }

    /**
     * Input validations
     *
     * @param Request $request
     * @return ValidationException
     */
    public function validateForm(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'fileToUpload' => 'required|file|image|max:100000',
            'link' => ['nullable','regex:/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/']
        ]);

        return $validatedData;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function post($id)
    {
        $post = Posts::find($id);
        $like = null;
        if (Auth::check()) {
            $like = Likes::where('user_id', Auth::user()->id)
                ->where('posts_id', $id)
                ->first();
        }
        $isLike = is_null($like) ? false : true;

        $file = $this->getImage($post);
        $type = $this->checkFileType($file);
        return view('post', ['post' => $post, 'file' => $file, 'type' => $type, 'isLiked' => $isLike]);
    }

    private function getImage($data)
    {
        try {
            if ($data->filename != null) {
                $image = asset('storage/files/' . $data->filename);
            }
            Log::debug($image);
            Log::debug(pathinfo($image, PATHINFO_EXTENSION));
            return $image;
        } catch (\Exception $e) {
            abort(404);
        }
    }

    private function checkFileType($path)
    {
        $ext = (pathinfo($path, PATHINFO_EXTENSION));
        switch ($ext) {
            case "mov":
            case "mp4":
                return "vid";
                break;
            case "jpg":
            case "png":
            case "jpeg":
                return "img";
                break;
            default:
                return "invalid";
        }
    }

    /**
     * Like
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function like($id)
    {
        $post = Posts::find($id);
        Likes::create([
            'user_id' => Auth::user()->id,
            'posts_id' => $post->id
        ]);
        $like = null;
        if (Auth::check()) {
            $like = Likes::where('user_id', Auth::user()->id)
                ->where('posts_id', $id)
                ->first();
        }
        $isLike = empty($like) ? false : true;
        return back()->with(['post' => $post, 'isLiked' => $isLike]);
    }

    public function updateIndex($id)
    {
        try {
            $post = Posts::find($id);
            $categories = Categories::all();
            Log::debug($post->categories);
            return view('post_update', ['post' => $post, 'categories' => $categories]);
        } catch (\Exception $e) {
            abort(404);
        }

    }

    /**
     * Posts Creation
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $this->validateForm($request);
        $post = Posts::find($request->id);
        $file = $post->filename;
        $user = Auth::user();
        $name = '';
        if ($files = $request->file('fileToUpload')) {
            $name = $request->username . date("Ymdhis") . '.' . $files->getClientOriginalExtension();
        }

        $post->title = $request->title;
        $post->filename = $file === $name ? $file : $name;
        $post->description = $request->description;
        $post->user_id = $user->id;
        $post->link = is_null($request->link) ? '' : $request->link;
        $result = $post->save();

        if (!$result) {
            return back()->with('create_failed', 'Opps! something went wrong');
        } else {
            if ($file != $name) {
                Storage::delete($file);
            }
            $post->categories()->sync($request->categories);
            Storage::disk('local')->putFileAs(
                'public/files/',
                $files,
                $name
            );
            return redirect()->route('dashboard');
        }
    }
}
