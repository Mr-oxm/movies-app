<?php

namespace App\Http\Controllers;
use Hash;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterUserRequest;

class SignupController extends Controller
{

    public function view(Request $request){
        return view('signup');
    }
    public function register(RegisterUserRequest $request)
    {
        $data= $request->validated();
        
        $data['password'] = Hash::make($request->password);

        User::create($data);

        //model evetns
        
        return redirect()->route('login.view');
    }
}


