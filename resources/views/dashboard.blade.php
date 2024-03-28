@extends('partials.index')

@section('script-head')
    <link rel="stylesheet" href="/css/pages/dashboard.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@endsection

@section('content')
    {{-- items populer --}}
    <h4 class="card-title">Popular Music ></h4>
    <div class="row row-items mb-4">
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card" style="width: 18rem;">
                <img src="/assets/images/dashboard/Img_5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text cursor-pointer" onclick="clickAuthor()">name of author</h5>
                    <p class="card-text cursor-pointer" onclick="clickTitle()">title song</p>
                    <small id="btn-like-1" onclick="likeClick('btn-like-1')" class="text-muted cursor-pointer"><i
                            class="mdi mdi-thumb-up cursor-pointer"></i>
                        27</small>
                    <div>
                        <button class="btn btn-outline-warning btn-circle">
                            <i class="mdi mdi-play icon-play"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- items most liked --}}
    <h4 class="card-title">Most Music Liked ></h4>
    <div class="row row-items mb-4">
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card" style="width: 18rem;">
                <img src="/assets/images/dashboard/Img_5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text cursor-pointer" onclick="clickAuthor()">name of author</h5>
                    <p class="card-text cursor-pointer" onclick="clickTitle()">title song</p>
                    <small id="btn-like-2" onclick="likeClick('btn-like-2')" class="text-muted cursor-pointer"><i
                            class="mdi mdi-thumb-up cursor-pointer"></i>
                        27</small>
                    <div>
                        <button class="btn btn-outline-warning btn-circle">
                            <i class="mdi mdi-play icon-play"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-body')
    <script src="/js/pages/dashboard.js"></script>
@endsection
