<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\AnimeUser;
class AnimeUserController extends Controller
{
    public function markAsWatched($animeId)
    {
        $user = auth()->user();
    
        $animeUser = AnimeUser::where('user_id', $user->id)
            ->where('anime_id', $animeId)
            ->first();
    
        if (!$animeUser) {
            $user->anime()->attach($animeId, ['watched' => true]);
        } else {
            $animeUser->update(['watched' => true]);
        }
        return response()->json(['message' => 'Unmark as watched']);
        //return redirect()->back();
    }
    
    public function unmarkAsWatched($animeId)
    {
        $user = auth()->user();
    
        $animeUser = AnimeUser::where('user_id', $user->id)
            ->where('anime_id', $animeId)
            ->first();
    
        if ($animeUser) {
            $animeUser->update(['watched' => false]);
        }
    
        //return redirect()->back();
        return response()->json(['message' => 'Mark as watched']);
    }
}
