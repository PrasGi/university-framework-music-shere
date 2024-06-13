@extends('partials.index')

@section('script-head')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="/css/helpers/icon-standart.css">
<link rel="stylesheet" href="/css/pages/music.css">
<link rel="stylesheet" href="/css/helpers/music-player.css">


@endsection

@section('content')
<div class="container border border-white  p-4">
    <div class="row">
        <div class="col">
            <div class="row d-flex align-items-center ">
                <div class="col-11">
                    <h1>{{ $forum->title }}</h1>
                </div>
                @if (auth()->user()->id == $forum->user_id || auth()->user()->role_id == 'admin')
                <div class="col-1">
                    <div class="dropdown">
                        <a class="btn no-bg no-border" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="menu-icon">
                                <i class="mdi mdi-dots-horizontal" style="font-size: 24px;"></i>
                            </span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('forum.edit', $forum->id) }}">Edit</a></li>

                            @if ($forum->status == 'open')
                            <li>
                                <form action="{{ route('forum.closepost', $forum->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="dropdown-item">Close Post</button>
                                </form>
                            </li>
                            @elseif($forum->status == 'closed')
                            <li>
                                <form action="{{ route('forum.openpost', $forum->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="dropdown-item">Open Post</button>
                                </form>
                            </li>
                            @endif


                            <li>
                                <form action="{{ route('forum.destroy', $forum->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item">Delete Post</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif

            </div>
            <p>{{ $forum->content }}</p>
            <p class="text-sm">
                <span class="op-6">Posted</span> {{
                \Carbon\Carbon::parse($forum->post_date)->diffForHumans() }} <span>by</span> {{
                $forum->user->name ?? 'Unknown User' }}
            </p>
            @if ($forum->status == 'open')
            <h4 class="pt-5 border-top border-white">Add a Comment</h4>
            <form action="{{ route('comment.store', $forum->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" id="comment_content" name="comment_content" rows="3" required></textarea>
                </div>
                <div class="row d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary m-3">Submit</button>
                </div>
            </form>
            @else
            <h5 class="pt-5 border-top border-white ">Post is closed. Comments are no longer accepted.</h5>
            @endif


            <h3 class="mx-2">Comments</h3>
            @foreach($forum->comments as $comment)
            <div class="container border border-secondary bg-dark py-2 px-3 mb-3">
                <div class="row mt-1 mb-3">
                    <div class="col">
                        <div class="row">
                            <div class="col-11 d-flex align-items-center">
                                <img class="img-xs rounded-circle mr-3" src="{{$comment->user->avatar ?? '/assets/images/faces/face27.jpg'}}" alt="User avatar">
                                <p class="" style="font-weight:bold">{{$comment->user->name ?? 'Unknown User' }}</p>
                            </div>
                            <div class="col-1">
                                @if (auth()->user()->id == $forum->user_id || auth()->user()->role_id == 'admin')
                                <div class="col-1">
                                    <div class="dropdown">
                                        <a class="btn no-bg no-border" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="menu-icon">
                                                <i class="mdi mdi-dots-horizontal" style="font-size: 24px;"></i>
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item edit-comment-btn" href="#" data-forum-id="{{ $forum->id }}" data-comment-id="{{ $comment->id }}">Edit Comment</a></li>
                                            <li>
                                                <form action="{{ route('comment.destroy', [$forum->id, $comment->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">Delete Comment</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" id="comment-content-{{ $comment->id }}">
                                <p>{{ $comment->comment_content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-sm mt-2 mb-1" style="opacity:0.5">
                    <span class="">Commented</span> {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.edit-comment-btn').on('click', function(e) {
            e.preventDefault();
            var forumId = $(this).data('forum-id');
            var commentId = $(this).data('comment-id');
            var commentContent = $('#comment-content-' + commentId).text().trim();

            var editForm = `
                <form action="{{ route('comment.update', ['forum' => $forum->id, 'comment' => 'COMMENT_ID']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <textarea class="form-control" name="comment_content" rows="3">${commentContent}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary cancel-edit-btn" data-comment-id="${commentId}">Cancel</button>
                </form>
            `;
            editForm = editForm.replace('COMMENT_ID', commentId);
            $('#comment-content-' + commentId).html(editForm);
        });

        $(document).on('click', '.cancel-edit-btn', function() {
            var commentId = $(this).data('comment-id');
            var originalContent = $(this).closest('form').find('textarea').val();
            $('#comment-content-' + commentId).text(originalContent);
        });
    });
</script>

@endsection