<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class Signout extends Controller
{
    public function signout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login.view')->with('success','');
    }

}
