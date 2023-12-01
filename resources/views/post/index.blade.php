@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Blog Posts</h1>
        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="card-title"><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h2>
                    <p class="card-text">{{ $post->content }}</p>

                    <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection