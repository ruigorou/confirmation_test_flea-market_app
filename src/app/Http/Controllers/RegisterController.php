<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function register() {
        return view('register');
    }

    public function store(RegisterRequest $request) {
        $user = $this->create_user($request);
        Auth::login($user);
        return redirect()->route('mypage.profile_setting');
    }

    private function create_user(RegisterRequest $request) {
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return $user;
    }
    
    public function setting_index(Request $request) {
        $user = Auth()->user();
        return view('profile_setting', compact('user'));
    }

    public function profile_setting(ProfileRequest $request) {
        $this->create_profile( $request);
        return redirect('/');
    }

    private function create_profile(ProfileRequest $request) {
        $data = [];
        if ($request->hasFile('image')) { 
            $path = $request->file('image')->store('public/image');
            $data['image'] = basename($path);
        }

        $profile = Profile::create([
            'user_id' => auth()->id(),
            'image' => $data['image']??null,
            'post' => $request->post,
            'address' => $request->address,
            'building' => $request->building,
        ]);

        return $profile;
    }

}
