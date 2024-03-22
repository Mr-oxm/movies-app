<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SignInUserRequest;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */

    public function view(Request $request){
        return view('welcome');
    }
    public function authenticate(SignInUserRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('movies.view');
        }

        return back()->withErrors();
    }
}