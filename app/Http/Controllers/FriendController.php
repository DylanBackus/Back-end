<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friend;
use Auth;

class FriendController extends Controller
{
    // Toon vriendenlijst
    public function index()
    {
        $user = Auth::user();
        $friends = $user->friends()->where('status', 'accepted')->get();
        return view('friends.index', compact('friends'));
    }

    // Voeg vriend toe
    public function addFriend(Request $request)
    {
        $request->validate([
            'friend_id' => 'required|exists:users,id',
        ]);

        $user = Auth::user();
        $friend = User::find($request->friend_id);

        if ($user->id == $friend->id) {
            return redirect()->back()->with('error', 'Je kunt jezelf niet als vriend toevoegen.');
        }

        $friendRequest = new Friend();
        $friendRequest->user_id = $user->id;
        $friendRequest->friend_id = $friend->id;
        $friendRequest->status = 'pending';
        $friendRequest->save();

        return redirect()->back()->with('success', 'Vriendverzoek verzonden!');
    }

    // Accepteer vriendverzoek
    public function acceptFriend($id)
    {
        $friendRequest = Friend::find($id);

        if ($friendRequest->friend_id != Auth::id()) {
            return redirect()->back()->with('error', 'Ongeldig verzoek.');
        }

        $friendRequest->status = 'accepted';
        $friendRequest->save();

        return redirect()->back()->with('success', 'Vriendverzoek geaccepteerd!');
    }

    // Weiger vriendverzoek
    public function rejectFriend($id)
    {
        $friendRequest = Friend::find($id);

        if ($friendRequest->friend_id != Auth::id()) {
            return redirect()->back()->with('error', 'Ongeldig verzoek.');
        }

        $friendRequest->delete();

        return redirect()->back()->with('success', 'Vriendverzoek geweigerd.');
    }
}
