<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumCommentController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request, Forum $forum)
    {
        $request->validate([
            'comment_content' => 'required',
        ]);

        $comment = new Comment();
        $comment->comment_content = $request->comment_content;
        $comment->user_id = auth()->user()->id;
        $comment->forum_id = $forum->id;

        if ($comment->save()) {
            return redirect()->route('forum.showdetails', $forum->id)->with('success', 'Comment added successfully.');
        } else {
            return back()->with('error', 'Failed to add comment. Please try again.');
        }
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $forumId, $commentId)
    {
      
        $comment = Comment::find($commentId);        
        $comment->comment_content = $request->input('comment_content');
        
        $comment->save();
    
        return redirect()->route('forum.showdetails', $forumId)->with('success', 'Comment updated successfully.');
    }
    

    public function destroy($forumId, $commentId)
    {
        $comment = Comment::where('forum_id', $forumId)->find($commentId);
        $comment->delete();

        return redirect()->route('forum.showdetails', $forumId);
    }
}
