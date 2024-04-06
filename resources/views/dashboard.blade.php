@extends('partials.index')

@section('script-head')
    <link rel="stylesheet" href="/css/pages/dashboard.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="/css/helpers/music-player.css">
    <link rel="stylesheet" href="/css/helpers/icon-standart.css">
@endsection

@section('content')
    @if ($datas)
        <h4 class="card-title">Result Search ></h4>
        <div class="row mb-4">
            @foreach ($datas as $data)
                <div class="col-md-3 mb-1">
                    <div class="card" style="width: 18rem;">
                        <img src="/{{ $data->file_thumbnail }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h5 class="card-text cursor-pointer" onclick="clickAuthor()">
                                        {{ Str::limit($data->artist, 10) }}</h5>
                                    <p class="card-text cursor-pointer" onclick="clickTitle()">
                                        {{ Str::limit($data->title, 15) }}</p>
                                    <small class="text-muted cursor-pointer"><i class="mdi mdi-download"></i>
                                        {{ $data->downloads }} </small>
                                    <small id="btn-like-1" class="text-muted "><i class="mdi mdi-eye "></i>
                                        {{ $data->views }}</small>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-outline-warning btn-circle btn-play"
                                    data-music-url="{{ '/' . $data->file_music }}" data-music-id="{{ $data->id }}">
                                    <i class="mdi mdi-play icon-play"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $datas->links() }}
        </div>
    @endif

    {{-- items populer --}}
    <h4 class="card-title">Popular Music ></h4>
    @if ($dataPopuler->isEmpty())
        <p>no data</p>
    @else
        <div class="row row-items mb-4">
            @foreach ($dataPopuler as $dataP)
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card" style="width: 18rem;">
                        <img src="/{{ $dataP->file_thumbnail }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h5 class="card-text cursor-pointer" onclick="clickAuthor()">
                                        {{ Str::limit($dataP->artist, 10) }}</h5>
                                    <p class="card-text cursor-pointer" onclick="clickTitle()">
                                        {{ Str::limit($dataP->title, 20) }}</p>
                                    <small class="text-muted cursor-pointer"><i class="mdi mdi-download"></i>
                                        {{ $dataP->downloads }} </small>
                                    <small id="btn-like-1" class="text-muted "><i class="mdi mdi-eye "></i>
                                        {{ $dataP->views }}</small>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-outline-warning btn-circle btn-play"
                                    data-music-url="{{ '/' . $dataP->file_music }}" data-music-id="{{ $dataP->id }}">
                                    <i class="mdi mdi-play icon-play"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- items most liked --}}
    <h4 class="card-title">New Music ></h4>
    @if ($dataLatest->isEmpty())
        <p>no data</p>
    @else
        <div class="row row-items mb-4">
            @foreach ($dataLatest as $dataL)
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card" style="width: 18rem;">
                        <img src="/{{ $dataL->file_thumbnail }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h5 class="card-text cursor-pointer" onclick="clickAuthor()">
                                        {{ Str::limit($dataL->artist, 10) }}</h5>
                                    <p class="card-text cursor-pointer" onclick="clickTitle()">
                                        {{ Str::limit($dataL->title, 20) }}</p>
                                    <small class="text-muted cursor-pointer"><i class="mdi mdi-download"></i>
                                        {{ $dataL->downloads }} </small>
                                    <small id="btn-like-1" class="text-muted "><i class="mdi mdi-eye "></i>
                                        {{ $dataL->views }}</small>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-outline-warning btn-circle btn-play"
                                    data-music-url="{{ '/' . $dataL->file_music }}" data-music-id="{{ $dataL->id }}">
                                    <i class="mdi mdi-play icon-play"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @include('components.music-player')
@endsection

@section('script-body')
    <script src="/js/pages/dashboard.js"></script>
    <script src="/js/helpers/music-player.js"></script>
@endsection
