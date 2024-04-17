@extends('partials.index')
@section('script-head')
    <style>
        .wrap-avatar {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40vh;
            transform: translateY(-50%);
        }

        .wrap-form {
            height: 400px;
            width: 700px;
            padding: 10px;
            position: relative;
            border-radius: 20px;
            /* Rounded border */
            backdrop-filter: blur(5px);
            /* Backdrop filter blur */
            background-color: rgba(240, 240, 240, 0.8);
            /* Background opacity */
        }

        #image-avatar {
            position: absolute;
            border: 1px solid rgb(255, 255, 255);
            margin-left: 50%;
            transform: translateX(-50%);
            top: -50px;
            height: 100px;
            width: 100px;
        }

        .change-avatar {
            position: absolute;
            top: 28px;
            transform: translateX(-50%);
            left: 54%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(5px);
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            height: 40px;
            width: 40px;
        }

        .change-password {
            position: absolute;
            top: 50px;
            transform: translateX(-50%);
            left: 49%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(5px);
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            height: 40px;
            width: 40px;
        }

        .icon {
            position: relative;
            top: -1px;
            margin-left: 3px;
        }

        #form {
            margin-top: 80px;
        }

        .mdi-upload {
            position: relative;
            top: 2px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var changeAvatarButton = document.querySelector('.change-avatar');
            var changePasswordButton = document.querySelector('.change-password');
            var modalAvatar = new bootstrap.Modal(document.getElementById('update-avatar-modal'));
            var modalPassword = new bootstrap.Modal(document.getElementById('update-password-modal'));

            changeAvatarButton.addEventListener('click', function() {
                modalAvatar.show();
            });

            changePasswordButton.addEventListener('click', function() {
                modalPassword.show();
            });
        });
    </script>
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

    <div class="wrap-avatar">
        <div class="wrap-form">
            <img id="image-avatar"
                src="@if (auth()->user()->avatar) {{ '/' . auth()->user()->avatar }}
            @else
                /assets/images/faces/face27.jpg @endif"
                class="img-fluid rounded-circle shadow-lg" alt="{{ auth()->user()->name }}">
            <span class="change-avatar shadow-lg">
                <i class="mdi mdi-camera-enhance text-dark icon"></i>
            </span>
            <span class="change-password shadow-lg">
                <i class="mdi mdi-key text-dark icon"></i>
            </span>

            <form id="form" action="{{ route('profile.update', auth()->user()->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label text-dark">Username</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="example name"
                        value="{{ auth()->user()->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-dark">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"
                        value="{{ auth()->user()->email }}" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="mt-3 btn btn-outline-dark">Save Setting</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal avatar -->
    <div class="modal fade" id="update-avatar-modal" tabindex="-1" aria-labelledby="update-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Change Avatar</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="upload-form" action="{{ route('profile.change.avatar', auth()->user()->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="music" class="form-label">Avatar *</label>
                            <input type="file" class="form-control" id="music" name="avatar" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-upload"></i> Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal avatar -->
    <div class="modal fade" id="update-password-modal" tabindex="-1" aria-labelledby="update-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Change Password</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="upload-form" action="{{ route('profile.change.password', auth()->user()->id) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Old password *</label>
                            <input type="password" id="old_password" class="form-control" name="old_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New password *</label>
                            <input type="password" id="new_password" class="form-control" name="new_password" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-key"></i> Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
