<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeNameController extends Controller
{
    public function showForm()
    {
        return view('namechange');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'current_password'],
        ]);
    
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();
    
        return redirect()->route('home')->with('success', 'Name updated successfully!');
    }
    
}
