@extends('partials.index')

@section('script-head')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="/css/helpers/icon-standart.css">
    <link rel="stylesheet" href="/css/pages/music.css">
    <link rel="stylesheet" href="/css/helpers/music-player.css">
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
            <form class="" action="{{ route('music.index') }}">
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
                <th scope="col">Views</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index => $data)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->artist }}</td>
                    <td>{{ $data->views }}</td>
                    <td>
                        <button class="btn btn-warning btn-play" data-music-url="{{ '/' . $data->file_music }}"
                            data-music-id="{{ $data->id }}"><i class="mdi mdi-play"></i> Play</button>
                        <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#update-modal"
                            data-bs-id="{{ $data->id }}" data-bs-title="{{ $data->title }}"
                            data-bs-artist="{{ $data->artist }}" data-bs-lyrics="{{ $data->lyrics }}"><i
                                class="mdi mdi-pencil-box-outline"></i> Edit</button>
                        <form id="delete-form" class="d-inline" action="{{ route('music.destroy', $data->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="confirmDelete()"><i
                                    class="mdi mdi-delete"></i>
                                Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('components.modal-update-music')

    <div class="d-flex justify-content-center">
        {{ $datas->links() }}
    </div>

    @include('components.music-player')
@endsection

@section('script-body')
    <script src="/js/pages/music.js"></script>
    <script src="/js/helpers/music-player.js"></script>
@endsection
