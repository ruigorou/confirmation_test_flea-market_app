<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function register() {
        return view('register');
    }

    public function store(RegisterRequest $request) {
        $this->user_create($request);
        return view('email_verification');
    }

    private function user_create(RegisterRequest $request) {
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return $user;
    }
    
    public function profile(Request $request) {
        return view('profile');
    }

}
