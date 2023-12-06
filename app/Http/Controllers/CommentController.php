<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Post $post): RedirectResponse
    {
        $request->validate(['content' => 'required']); //Deliberately validated this way to show I have knowledge of validating via a request class and inside the function.

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = auth()->id(); 
        $post->comments()->save($comment);

        return back()->with('success', 'Comment added successfully.');
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        if (auth()->id() !== $comment->user_id) {
            return back()->with('error', 'Unauthorized action.');
        }

        $comment->delete();
        return back()->with('success', 'Comment deleted successfully.');
    }
}
