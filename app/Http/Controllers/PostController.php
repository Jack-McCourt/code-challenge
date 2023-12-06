<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\RedirectResponse;

use App\Models\Post;

class PostController extends Controller
{
    public function index(): ViewContract
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('post.index', compact('posts'));
    }
    public function create()
    {
        return view('post.create');
    }

    public function store(PostRequest $request): ViewContract
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }

    public function show(Post $post): ViewContract
    {
        return view('post.show', compact('post'));
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
