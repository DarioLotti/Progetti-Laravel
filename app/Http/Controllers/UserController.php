<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUserProfile(){
        $announcements = Announcement::where('user_id', auth()->id())->where('is_accepted', true)->take(3)->get()->sortByDesc('created_at');
        return view('user.index', compact('announcements'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUserProfile()
    {
        $user_announcements = Auth::user()->announcements;
        foreach ($user_announcements as $user_announcement) {
            $user_announcement->update([
                'user_id'=> NULL,
            ]);
        }
        Auth::user()->delete();
        return redirect(route('homepage'))->with('message' , 'Il tuo account è stato correttamente eliminato');
    }
}
