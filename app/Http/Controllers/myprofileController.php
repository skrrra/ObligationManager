<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class myprofileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.myprofile', [
            'user' => $user
        ]);
    }

    public function changeUsername(Request $request)
    {
        $validate = $request->validate([
            'username' => 'bail|required',
            'password' => 'bail|required|password',
        ]);

        $request->user()->update(['name' => $validate['username']]);
        
        return redirect('/profile')->with('status', 'Username has been updated!');
    }

    public function changePassword(Request $request)
    {
        $validate = $request->validate([
            'password'    => 'required|bail|password',
            'newpassword' => 'required|bail|min:8|confirmed',
        ]);
        
        $request->user()->update(['password' => Hash::make($validate['newpassword'])]);
        
        return redirect('/profile')->with('status', 'Password has been updated!');
    }

    public function changeEmail(Request $request)
    {
        $validate = $request->validate([
            'newemail'    => 'required|bail',
            'password' => 'required|bail|password',
        ]);
        
        $request->user()->update(['email' => $validate['newemail']]);
        
        return redirect('/profile')->with('status', 'Email has been updated!');
    }

}
