<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function accounts()
    {
        return view('dashboard.accounts', [
            'users' => User::get()
        ]);
    }

    public function store_users(Request $request) {
        $formFields = $request->validate([
            'username' => ['required', 'min:4'],
            'password' => 'required|confirmed|min:6',
            'access_type' => 'required'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        
        return back()->with('message', 'User Created Successfully');
    }
    

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();    
        $request->session()->regenerateToken();    

        return redirect('/')->with('message', 'You have been logged out');

    }

    public function login() {
        return view('users.login');
    }

    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', "You are logged in");
        }

        return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');

    }


}
