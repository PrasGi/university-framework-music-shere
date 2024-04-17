<?php

namespace App\Http\Controllers;

use App\Http\Helpers\StoreHelper;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.profile');
    }

    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,except,' . $user->id,
        ]);

        if ($request->hasFile('avatar')) {
            $validate['avatar'] = StoreHelper::storeFile($request->file('avatar'), 'profile');
        }

        if ($user->update($validate)) {
            return redirect()->back()->with('success', 'Profile updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update profile');
        }
    }

    public function changeAvatar(Request $request, User $user)
    {
        $validate = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validate['avatar'] = StoreHelper::storeFile($request->file('avatar'), 'profile');

        if ($user->update($validate)) {
            return redirect()->back()->with('success', 'Avatar updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update avatar');
        }
    }
}
