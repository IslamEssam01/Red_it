<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    //

    public function store(Request $request, $post_id)
    {

        Comment::create(['user_id' => Auth::user()->id, 'post_id' => $post_id, 'content' => $request->content]);

        return redirect('/');


    }

    public function showPartial(Request $request)
    {
        
        return view('Layouts.partialComment')->with('commentContent', $request->content)->with('user', Auth::user());
    }

    public function delete($id)
    {

        $comment = Comment::find($id);
        $comment->delete();
        // dd($comment);

        return redirect('/');
    }
}
