<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Anime extends Model
{
    protected $table = 'anime';
    protected $fillable = ['name', 'description', 'link', 'previmg', 'likes', 'dislikes'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'anime_user')->withPivot('watched');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();   // Fetch updated comments with user information in descending order
    }
    
    public function animeUsers()
{
    return $this->hasMany(AnimeUser::class);
}

public function isWatched()
{
    $user = Auth::user();

    // Sprawdź, czy użytkownik obejrzał dane anime
    return $user && $this->users()->where('user_id', $user->id)->where('watched', true)->exists();
}
public static function nextEpisode($currentEpisodeId)
    {
        $currentEpisode = self::find($currentEpisodeId);
        $nextEpisode = self::where('id', '>', $currentEpisode->id)->orderBy('id', 'asc')->first();

        return $nextEpisode ? $nextEpisode->id : null;
    }

    public static function prevEpisode($currentEpisodeId)
    {
        $currentEpisode = self::find($currentEpisodeId);
        $prevEpisode = self::where('id', '<', $currentEpisode->id)->orderBy('id', 'desc')->first();

        return $prevEpisode ? $prevEpisode->id : null;
    }

}

