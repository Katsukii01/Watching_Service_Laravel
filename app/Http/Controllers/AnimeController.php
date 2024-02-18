<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use Illuminate\Support\Facades\Storage;
use App\Models\AnimeUser;

class AnimeController extends Controller
{
        public function index()
    {
        $anime = Anime::all();
        return view('anime.index', compact('anime'));
    }

    public function show($id)
    {
        $anime = Anime::findOrFail($id);
        if(auth()->user()){
        $user = auth()->user();
        $animeUser = AnimeUser::create([
            'user_id' => $user->id,
            'anime_id' => $anime->id,
            'liked' => 0,
        ]);
        }
        return view('anime.show', compact('anime'));
    }

    public function create()
    {
        $anime = Anime::all();
        return view('anime.create', compact('anime'));
    }

    public function store(Request $request)
    {
        if(auth()->user()->id==2){
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|string',
            'previmg' => 'required|image|mimes:jpeg,png,jpg,gif',
            'likes' => 'required|integer',
            'dislikes' => 'required|integer',
        ]);
    
        // Utwórz rekord anime
        $anime = Anime::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'link' => $request->input('link'),
            'likes' => $request->input('likes'),
            'previmg' => '.png',
            'dislikes' => $request->input('dislikes'),
        ]);
    
        // Uzyskaj ID utworzonego rekordu anime
        $AnimeId = $anime->id;
    
        // Zapisz obrazek na dysku
        $imagePath = $request->file('previmg')->storeAs('public/prev', "{$AnimeId}.png");
    
        // Aktualizuj nazwę obrazka w rekordzie anime
        $anime->update(['previmg' => "{$AnimeId}.png"]);
    
        return redirect()->route('anime.create')->with('success', 'Anime created successfully');
        }else{
            return redirect()->route('anime.create')->with('failure', 'not allowed');
            }
        }

    public function edit($id)
    {
        $anime = Anime::findOrFail($id);
        return view('anime.edit', compact('anime'));
    }

    public function update(Request $request, $id)
    {
        if(auth()->user()->id==2){
        $anime = Anime::findOrFail($id);
    
        $anime->name = $request->input('name');
        $anime->description = $request->input('description');
        $anime->link = $request->input('link');
        $anime->likes = $request->input('likes');
        $anime->dislikes = $request->input('dislikes');

        $AnimeId = $anime->id;
        
        // Sprawdź, czy przesłano nowy obrazek
        if ($request->hasFile('previmg')) {
            // Usuń poprzedni obrazek z dysku
            Storage::delete('public/prev/' . $anime->previmg);
    
            // Zapisz nowy obrazek na dysku
            $previmgPath = $request->file('previmg')->storeAs('public/prev', "{$AnimeId}.png");
            $anime->previmg = basename($previmgPath);
        }
    
        $anime->save();
    
            return redirect()->route('anime.create')->with('success', 'Anime updated successfully');
        }else{
            return redirect()->route('anime.create')->with('failure', 'not allowed');
        }
    }

    public function destroy($id)
    {
        if(auth()->user()->id==2){
        $anime = Anime::findOrFail($id);
    
        // Usuń obrazek z dysku
        Storage::delete('public/prev/' . $anime->previmg);
    
        // Usuń rekord z bazy danych
        $anime->delete();
    
        return redirect()->route('anime.create')->with('success', 'Anime deleted successfully');
    }else{
        return redirect()->route('anime.create')->with('failure', 'not allowed');
    }
    }

    public function like($id)
    {
        $anime = Anime::find($id);
        if (!$anime) {
            return redirect()->back()->with('error', 'Anime not found.');
        }
    
        $user = auth()->user();
    
        $animeUser = AnimeUser::where('user_id', $user->id)->where('anime_id', $anime->id)->first();

        if ($animeUser) {
            // Użytkownik wcześniej polubił lub skomentował
            if ($animeUser->liked == 1) {
                // Jeśli wcześniej polubił, usuń like
                $animeUser->liked = 0;
                $animeUser->save();
                $anime->decrement('likes');
            } elseif ($animeUser->liked == 2) {
                // Jeśli wcześniej skomentował dislike, zmień na like
                $animeUser->liked = 1;
                $animeUser->save();
                $anime->increment('likes');
                $anime->decrement('dislikes');
            }else{
                $animeUser->liked = 1;
                $animeUser->save();
                $anime->increment('likes');
            }
        } 
        //return redirect()->back();
        return response()->json(['likes' => $anime->likes, 'dislikes' => $anime->dislikes]);

    }
    
    public function dislike($id)
    { 
        $anime = Anime::find($id);
    
        if (!$anime) {
            return redirect()->back()->with('error', 'Anime not found.');
        }
    
        $user = auth()->user();
    
        $animeUser = AnimeUser::where('user_id', $user->id)->where('anime_id', $anime->id)->first();

        if ($animeUser) {
            // Użytkownik wcześniej polubił lub skomentował
            if ($animeUser->liked == 2) {
                // Jeśli wcześniej skomentował dislike, usuń dislike
                $animeUser->liked = 0;
                $animeUser->save();
                $anime->decrement('dislikes');
            } elseif ($animeUser->liked == 1) {
                // Jeśli wcześniej polubił, zmień na dislike
                $animeUser->liked = 2;
                $animeUser->save();
                $anime->increment('dislikes');
                $anime->decrement('likes');
            }else{
                $animeUser->liked = 2;
                $anime->increment('dislikes');
                $animeUser->save();
            }
        } 
        return response()->json(['likes' => $anime->likes, 'dislikes' => $anime->dislikes]);

        //return redirect()->back();
        
    }
    

}

