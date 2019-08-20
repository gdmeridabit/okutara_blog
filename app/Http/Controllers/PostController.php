<?php

namespace App\Http\Controllers;

use App\Categories;
use App\PostCategorize;
use App\Posts;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use function PHPSTORM_META\type;

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
        return view('post',['categories' => $categories]);
    }

    /**
     * Posts Creation
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        Log::debug($request->input('categories'));
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
            'fileToUpload' => 'required|image|max:10000',
        ]);

        return $validatedData;
    }

    public function list($id)
    {
       $category = Categories::where('id', $id)->get();
        return view('post_list',['category' => $category]);
    }
}
