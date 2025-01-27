<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginPage');
    }
    public function register(StoreUserRequest $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('images', $filename, 'public');
            $user->image = $filename;
        }
        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
    }
    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
                'password' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function editProfile()
    {
        return view('user.edit');
    }

    public function updateProfile(UpdateUserRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->hasfile('image')) {
            unlink(public_path('storage/images/'.$user->image));
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('images', $filename, 'public');
            $user->image = $filename;
        }
        $user->save();
        return redirect()->route('dashboard');
    }
}
