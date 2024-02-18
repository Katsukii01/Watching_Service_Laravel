<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $userId = $user->id;

        // Usuń istniejące zdjęcie, jeśli istnieje
        $existingImagePath = "public/avatar/{$userId}.png";
        if (Storage::exists($existingImagePath)) {
            Storage::delete($existingImagePath);
        }

        // Zapisz nowe zdjęcie
        $photoPath = $request->file('photo')->storeAs('public/avatar', "{$userId}.png");
        
        // Aktualizuj pole 'img' w tabeli 'users'
        $user->img = "storage/avatar/{$userId}.png";
        $user->save();

        return redirect()->route('home')->with('success', 'Zdjęcie zostało pomyślnie przesłane i zapisane.');
    }
}
