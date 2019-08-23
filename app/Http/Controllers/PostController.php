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
            'fileToUpload' => 'required|file|max:1000000',
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
        $file = $this->getImage($post);
        $type = $this->checkFileType($file);
        return view('post',['post' => $post, 'file' => $file, 'type' => $type]);
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

    private function checkFileType($path) {
        $ext = (pathinfo($path, PATHINFO_EXTENSION));
        switch ($ext) {
            case "mov": case "mp4":
                return "vid";
                break;
            case "jpg": case "png": case "jpeg":
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
            'user_id' => $post->user->id,
            'posts_id' => $post->id
        ]);
        return back()->with('post', $post);
    }
}
