<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
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
            return view('auth.login', ['page' => 'login']);
        }

        if($request->isMethod('post')) {
            $credentials = $request->validate([
                'email' => ['required', 'string'],
                'password' => ['required', 'string']
            ]);

            $user = User::where('email', $credentials['email'])->first();

            if(!$user || !Hash::check($credentials['password'], $user->password)) {
                return redirect()->back()
                    ->withInput(['email' => $credentials['email']])
                    ->withErrors(['email' => 'Invalid credentials']);
            }

            Auth::login($user);

            return redirect()->route('posts.index');
        }
    }
}
