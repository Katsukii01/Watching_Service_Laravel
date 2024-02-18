<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Anime;
class CommentController extends Controller
{    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }
public function store(Request $request, $animeId)
{
    $request->validate([
        'content' => 'required|string',
    ]);

    $comment = new Comment([
        'content' => $request->content,
        'anime_id' => $animeId,
    ]);

    auth()->user()->comments()->save($comment);
    $anime = Anime::findOrFail($animeId);
    $anime->comments()->save($comment);


       // Fetch updated comments with user information in descending order
       $comments = $anime->comments()->with('user')->latest()->get();

    return response()->json(['message' => 'Comment added successfully', 'comments' => $comments]);
    //return redirect()->back();
}
public function destroy(Request $request,$id)
{
    // Check if the user is authenticated
    if (!auth()->check()) {
        return redirect()->route('login'); // Redirect to login if not authenticated
    }

    // Find the comment
    $comment = Comment::find($id);

    // Check if the comment exists
    if (!$comment) {
        return redirect()->route('home')->with('error', 'Comment not found'); // Redirect with an error message
    }

    // Check if the user is the owner of the comment
    if (auth()->user()->id != $comment->user_id) {
        return redirect()->route('home')->with('error', 'You are not authorized to delete this comment'); // Redirect with an error message
    }

    // Delete the comment
    $comment->delete();

     // Redirect back with a success message
      // Fetch updated comments with user information in descending order
    $animeId = $request->animeId;
    $anime = Anime::findOrFail($animeId);
    $comments = $anime->comments()->with('user')->latest()->get();

    //return redirect()->back()->with('success', 'Comment deleted successfully');
    return response()->json(['message' => 'Comment deleted successfully', 'comments' => $comments]);
}


}
