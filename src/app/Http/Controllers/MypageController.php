<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function listed_item() {
        $user = Auth()->user();
        return view('mypage', compact('user'));
    }
}
