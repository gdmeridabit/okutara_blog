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
        return view('post_create',['categories' => $categories]);
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

        $post->title = $request->title;
        $post->filename = $name;
        $post->description = $request->description;
        $post->user_id = $user->id;
        $post->link = is_null($request->link) ? '' : $request->link;
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
            return back()->with('create_success', 'Congratulations you successfully created your post!');
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
            'title' => 'required|max:50',
            'description' => 'required|max:500',
            'fileToUpload' => 'required|file|image|max:100000',
            'link' => 'nullable|regex:/\b(youtube)\b/i'
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
        if(Auth::check()) {
            $like = Likes::where('user_id', Auth::user()->id)
                ->where('posts_id', $id)
                ->first();
        }
        $isLike = is_null($like) ? false : true;

        $file = $this->getImage($post);
        $type = $this->checkFileType($file);
        return view('post',['post' => $post, 'file' => $file, 'type' => $type, 'isLiked' => $isLike]);
    }

    private function getImage($data) {
        try {
            if($data->filename != null) {
                $image = asset('storage/files/' . $data->filename);
            }
            Log::debug($image);
            Log::debug(pathinfo($image, PATHINFO_EXTENSION));
            return $image;
        } catch (\Exception $e) {
            abort(404);
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
        if(Auth::check()) {
            $like = Likes::where('user_id', Auth::user()->id)
                ->where('posts_id', $id)
                ->first();
        }
        $isLike = empty($like) ? false : true;
        return back()->with(['post' => $post, 'isLiked' => $isLike]);
    }

    public function updateIndex($id) {
        $post = Posts::find($id);
        $categories = Categories::all();
        Log::debug($post->categories);
        return view('post_update', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Posts Creation
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update($id, Request $request)
    {
        Log::debug($request->description);
        $this->validateForm($request);
        $post = Posts::find($id);
        $user = Auth::user();
        $name = '';
        if ($files = $request->file('fileToUpload')) {
            $name = $request->username . date("Ymdhis") . '.' . $files->getClientOriginalExtension();
        }

        $post->title = $request->title;
        $post->filename = $name;
        $post->description = $request->description;
        $post->user_id = $user->id;
        $post->link = is_null($request->link) ? '' : $request->link;
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
            return back()->with('create_success', 'Congratulations you successfully updated your post!');
        }
    }
}
