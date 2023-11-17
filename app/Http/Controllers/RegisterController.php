<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        //pass - run next line
        //fail - redirect back
        $cleanData = request()->validate([
            'name' => ['required', 'max:20'],
            'username' => ['required', 'max:20'],
            'email' => ['required', 'max:20', 'email'],
            'password' => ['required', 'min:8', 'max:20'],
        ]);

        $user = new User();
        $user->name = $cleanData['name'];
        $user->username = $cleanData['username'];
        $user->email = $cleanData['email'];
        $user->password = $cleanData['password'];
        $user->save();

        //login
        auth()->login($user);

        return redirect('/')->with('message', 'Welcome ' . $user->name);
    }
}
