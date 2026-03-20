<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment_create(CommentRequest $request) {
        $user = auth()->user();
        Comment::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'comment' => $request->comment
        ]);
        return redirect()->route('item.detail', $request->product_id);
    }
}
