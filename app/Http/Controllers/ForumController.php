<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forum = Forum::with('user')->withCount('comments')->orderBy('post_date', 'desc')->get();

        return view('pages.forum', compact('forum'));
    }

    public function create()
    {
        return view('components.forum-insert');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $validate['user_id'] = auth()->user()->id;


        if (Forum::create($validate)) {
            response()->json([
                'status_code' => 200,
                'message' => 'post added successfully'
            ]);

            return redirect()->route('forum.index');
        } else {
            return response()->json([
                'status_code' => 500,
                'message' => 'Internal server error'
            ]);
        }
    }

    public function showdetails(Forum $forum)
    {
        // Load comments with forum
        $forum->load('comments.user');

        return view('pages.forum_details', compact('forum'));
    }

    public function edit($id) {
        $forum = Forum::find($id);
        return view('components.forum-update', compact('forum'));
    }

    public function update(Request $request, $id) {
        $forum = Forum::find($id);
        $forum->title = $request->input('title');
        $forum->content = $request->input('content');

        $forum->save();

        return redirect()->route('forum.showdetails', $forum->id);
    }

    public function closepost($id) {
        $forum = Forum::find($id);
        $forum->status = 'closed';
        $forum->save(); 

        
        return redirect()->route('forum.showdetails', $forum->id);
    }
    public function openpost($id) {
        $forum = Forum::find($id);
        $forum->status = 'open';
        $forum->save(); 

        
        return redirect()->route('forum.showdetails', $forum->id);
    }

    public function destroy($id)
    {
        Comment::where('forum_id', $id)->delete();

        $forum = Forum::find($id);
        $forum->delete();

        return redirect()->route('forum.index');
    }
}
