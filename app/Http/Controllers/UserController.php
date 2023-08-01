<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    //

    public function updateInfo(Request $request, $id)
    {

        $user = User::find($id);

        $user->email = $request->email;
        $user->name = $request->name;

        $user->save();

        return redirect()->route('controlPanel');
    }

    public function updatePassword(Request $request, $id)
    {

        $user = User::find($id);

        $user->password = $request->password;
        $user->save();
        return redirect()->route('controlPanel');

    }

    public function updateImage(Request $request, $id)
    {

        $user = User::find($id);
        Storage::disk('public')->delete($user->image);
        $image = $request->image;
        $imagePath = $image->store('images', 'public');
        $user->image = $imagePath;
        $user->save();
        return redirect()->route('controlPanel');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/');
        // $this->logout($request);
    }


    public function likedPosts()
    {


        return view('User.likedPosts')->with('posts', Auth::user()->likedPosts);

    }

    public function userPosts()
    {
        return view('User.userPosts')->with('user', Auth::user())->with('posts', Auth::user()->posts);
    }

    public function profile()
    {


        return view('User.profile')->with('user', Auth::user())->with('posts', Auth::user()->posts);

    }
}