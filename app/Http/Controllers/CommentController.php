<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('blog:id,title')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.comments.index', compact('comments'));
    }
    public function store(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email',
            'comment' => 'required|string',
        ]);

        // Save the comment
        Comment::create([
            'blog_id' => $id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Your comment has been posted!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('admincomments.index')->with('success', 'Comment deleted successfully.');
    }
}
