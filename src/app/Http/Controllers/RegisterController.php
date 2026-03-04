<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;

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
        return redirect()->route('profile');
    }

    private function create_user(RegisterRequest $request) {
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return $user;
    }
    
    

}
