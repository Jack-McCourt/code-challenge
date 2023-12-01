@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a Blog Post</h1>
        <form method="POST" action="{{ route('post.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>

                @error('title')
                    <div class="error"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>

                @error('content')
                    <div class="error"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection