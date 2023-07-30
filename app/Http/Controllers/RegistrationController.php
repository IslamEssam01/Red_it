<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    //

    public function create()
    {
        return view('Guest.Forms.Register');
    }

    public function store(Request $request)
    {

        $image = $request->image;

        $imagePath = $image->store('images', 'public');
        if ((User::where('email', $request->email)->exists())) {
            return back()->withErrors([
                'email' => 'This email is already in use',
            ]);
        }
        $user = User::create(['name' => $request->name, 'email' => $request->email, 'password' => $request->password, 'image' => $imagePath]);

        Auth::login($user);

        return redirect('/');
    }
}