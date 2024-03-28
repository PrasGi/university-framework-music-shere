@extends('partials.index')

@section('script-head')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="/css/helpers/icon-standart.css">
    <link rel="stylesheet" href="/css/pages/music.css">
@endsection

@section('content')
    <div class="info">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-4">
            <form class="" action="{{ route('dashboard') }}">
                <input type="text" class="form-control" placeholder="Search my music" name="search">
            </form>
        </div>
        <div class="col-md-2">
            @include('components.button-create-music')
        </div>
    </div>

    <table class="table table-dark mb-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Artist</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index => $data)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->artist }}</td>
                    <td>
                        <button class="btn btn-warning btn-play" data-music-url="{{ '/' . $data->file_music }}"><i
                                class="mdi mdi-play"></i> Play</button>
                        <button class="btn btn-outline-warning"><i class="mdi mdi-pencil-box-outline"></i> Edit</button>
                        <button class="btn btn-outline-danger"><i class="mdi mdi-delete"></i> Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="music-player" class="music-player rounded-pill">
        <div class="audio-controls">
            <button id="pause-btn" class="btn btn-outline-warning"><i class="mdi mdi-pause"></i> Pause</button>
            <div id="time-elapsed" class="time-elapsed"></div>
        </div>
        <div class="progress-bar-container">
            <div id="progress-bar" class="progress-bar"></div>
        </div>
        <audio id="audio-player" controls>
            <source src="" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>
@endsection

@section('script-body')
    <script src="/js/pages/music.js"></script>
@endsection
