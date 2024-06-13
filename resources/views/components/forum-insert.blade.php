@extends('partials.index')

@section('script-head')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="/css/helpers/icon-standart.css">
<link rel="stylesheet" href="/css/pages/music.css">
<link rel="stylesheet" href="/css/helpers/music-player.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Create New Post</h1>
            <form action="{{ route('forum.store') }}" method="POST">
                @csrf
                <div class="form-group ">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection