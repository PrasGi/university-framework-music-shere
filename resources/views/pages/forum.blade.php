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
        <div class="col mb-4 d-flex justify-content-end">
            <a type="button" class="btn btn-primary" href="{{route('forum.create')}}">New Post</a>
        </div>
        <!-- Main content -->
        <div class="col-lg-12 mb-3">
            @foreach($forum as $forum)
            <div
                class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
                <div class="row align-items-center">
                    <div class="col-md-10 mb-sm-0">
                        <h5 class="mb-3">
                            <a href="{{ route('forum.showdetails', $forum->id) }}" class="text-primary">{{$forum->title}}</a>
                        </h5>
                        <p class="text-white-50">
                            {{ \Illuminate\Support\Str::words($forum->content, 10, '...') }}
                        </p>
                        <p class="text-sm">
                            <span class="op-6">Posted</span> {{
                            \Carbon\Carbon::parse($forum->post_date)->diffForHumans() }} <span>by</span> {{ //Masih error
                            $forum->user->name ?? 'Unknown User' }}
                        </p>
                    </div>
                    <div class="col-md-2 op-7">
                        <div class="row text-center op-7">
                            <div class="col px-1">
                              <span class="d-block text-sm">{{ $forum->comments_count }} replies</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection