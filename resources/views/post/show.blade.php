@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">
                    <p>{{ $post->content }}</p>
                </div>
            </div>

            @auth
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="{{ route('comments.store', $post) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="content" class="form-control" rows="3" placeholder="Leave a comment" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </form>
                    </div>
                </div>
            @endauth

            @if($post->comments && $post->comments->count() > 0)
                <div class="mt-4">
                    <h5>Comments:</h5>
                    @foreach ($post->comments as $comment)
                        <div class="card mt-3">
                            <div class="card-body">
                                <p>{{ $comment->content }}</p>
                                <small>Commented by {{ $comment->user->name }} on {{ $comment->created_at->toFormattedDateString() }}</small>

                                @if(Auth::check() && Auth::user()->id == $comment->user_id)
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="mt-4">There are no comments yet.</p>
            @endif

        </div>
    </div>
</div>
@endsection