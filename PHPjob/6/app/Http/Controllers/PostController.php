<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function add()
    {
        // return view('post');
        return view('post.create');
    }

    public function create(Request $request)
    {
        Log::debug($request->all());
        $this->validate($request, Post::$rules);
        $post = new Post;
        $form = $request->all();
        unset($form['_token']);

        $post->fill($form);
        $post->save();

        return redirect('post/create');
    }

    public function index(Request $request)
    {
        $user = User::all();
        $post = Post::orderBy('created_at', 'desc')->get();
        return view('post.create', ['posts' => $post, 'users' => $user]);
    }

    public function delete(Request $request)
    {
        Log::debug($request->all());
        $post = Post::find($request->id);
        $post->delete();

        return redirect('post/create');
    }
}
