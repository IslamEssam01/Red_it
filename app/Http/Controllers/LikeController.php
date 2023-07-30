<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //

    public function like($post_id)
    {





        $like = Like::where('like', true)->where('post_id', $post_id)->where('user_id', Auth::user()->id)->first();

        if ($like) {
            $like->delete();
        } else {
            Like::updateOrCreate(
                ['post_id' => $post_id, 'user_id' => Auth::user()->id],
                ['like' => true]
            );
        }
        return redirect('/');
    }

    public function likeGuest($post_id)
    {





        Like::updateOrCreate(
            ['post_id' => $post_id, 'user_id' => Auth::user()->id],
            ['like' => true]
        );

        return redirect('/');
    }



    public function dislike($post_id)
    {

        $like = Like::where('like', false)->where('post_id', $post_id)->where('user_id', Auth::user()->id)->first();

        if ($like) {
            $like->delete();
        } else {
            Like::updateOrCreate(
                ['post_id' => $post_id, 'user_id' => Auth::user()->id],
                ['like' => false]
            );
        }



        return redirect('/');
    }

    public function dislikeGuest($post_id)
    {


        Like::updateOrCreate(
            ['post_id' => $post_id, 'user_id' => Auth::user()->id],
            ['like' => false]
        );




        return redirect('/');
    }
}