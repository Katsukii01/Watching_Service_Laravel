<?php
// app/Http/Controllers/AccountController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function showDeleteForm()
    {
        return view('account.delete');
    }
    public function deleteAccount(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'current_password'],
        ]);
    
        $user = Auth::user();
    
        if (Hash::check($request->current_password, $user->password)) {
        // Delete the user account
        $userId = $user->id;
        $existingImagePath = "public/avatar/{$userId}.png";
        if (Storage::exists($existingImagePath)) {
            Storage::delete($existingImagePath);
        }

        $user->delete();
    
        // Optionally, you may log the user out after deleting the account
        Auth::logout();
    
        // Redirect to a thank you page or wherever you'd like
        return redirect('/')->with('success', 'Your account has been successfully deleted.');
        } else {
            return back()->withErrors(['current_password' => 'Incorrect current password.']);
        }
    
    

    }
}