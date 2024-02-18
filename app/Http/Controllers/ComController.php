<?php

// app/Http/Controllers/CommentsController.php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
class ComController extends Controller
{

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
        if (auth()->user()->id != 2) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete this comment'); // Redirect with an error message
        }
    
        // Delete the comment
        $comment->delete();
    
        return redirect()->back()->with('success', 'Comment deleted successfully');
    }
    

    
}

