<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('post.index', compact('posts'));
    }
    public function create()
    {
        return view('post.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
