<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //


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
}