<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //


    public function show($id)
    {

        $post = Post::find($id);

        return view('postPage')->with('post', $post);
    }

    public function create()
    {


        return view('User.Forms.addPost');

    }


    public function store(Request $request)
    {

        Post::create(['content' => $request->content, 'user_id' => Auth::user()->id]);

        return redirect('/');

    }

    public function delete($id)
    {
        $post = Post::find($id);


        $post->delete();

        return redirect()->route('home');

    }

    public function search(Request $request)
    {

        $searchKeyWord = $request->search;
        $posts = Post::where('content', 'like', '%' . $searchKeyWord . '%')->get();

        return view('search')->with('user', Auth::check() ? Auth::user() : null)->with('posts', $posts);
    }
}