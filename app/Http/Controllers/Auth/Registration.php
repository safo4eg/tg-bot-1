<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Registration extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if($request->isMethod('get')) {
            return view('auth.register', ['page' => 'register']);
        }

        if($request->isMethod('post')) {
            $attributes = $request->validate([
                'login' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'email', 'unique:'.User::class],
                'password' => ['required', 'string', Password::min(8)->mixedCase()->numbers(), 'confirmed']
            ]);

            $attributes['password'] = Hash::make($attributes['password']);

            $user = User::create($attributes);

            Auth::login($user);

            return redirect()->route('posts.index');
        }
    }
}
