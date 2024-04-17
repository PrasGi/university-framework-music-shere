<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // remember me
        if ($request->has('remember')) {
            Cache::put('email', $request->email);
            Cache::put('password', $request->password);
        }

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    public function registerPage()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $validate['password'] = bcrypt($request->password);
        $validate['role_id'] = 2;

        $user = User::create($validate);


        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('error', 'Failed to register');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back();
    }

    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        if (password_verify($request->old_password, $user->password)) {
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to change password');
        }
    }
}
