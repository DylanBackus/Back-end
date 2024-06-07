<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    // Toon gebruikersprofiel
    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }

    // Bewerk gebruikersprofiel
    public function editProfile()
    {
        $user = Auth::user();
        return view('user.edit_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            $avatarName = $user->id . '_avatar' . time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $avatarName);
            $user->avatar = $avatarName;
        }

        $user->save();

        return redirect()->route('user.profile', ['id' => $user->id])->with('success', 'Profiel bijgewerkt!');
    }
}
