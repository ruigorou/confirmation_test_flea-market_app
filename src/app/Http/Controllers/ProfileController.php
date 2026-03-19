<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\User;
class ProfileController extends Controller
{
     public function profile () {
        $user = auth()->user();
        $profile = $user->profile;
        return view('profile', compact('user', 'profile'));
    }
    public function profile_create(ProfileRequest $request) {
        $this->save_profile( $request);
        return redirect()->route('mypage');
    }

    private function save_profile(ProfileRequest $request) {
        $user = auth()->user();
        $profile = $user->profile;
        
        $data = [
            'post' => $request->post,
            'address' => $request->address,
            'building' => $request->building,
        ];
        
        if ($request->hasFile('image')) { 
            $path = $request->file('image')->store('public/image');
            $data['image'] = basename($path);
        }

        if ($profile) {
            Profile::find($profile->id)->update($data);
            User::find($profile->user_id)->update([
                'name' => $request->name
            ]);
        } else {
            // なければ create
            $profile = Profile::create(array_merge($data, ['user_id' => $user->id]));
        }
    }
}
