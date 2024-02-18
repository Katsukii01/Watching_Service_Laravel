<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use Illuminate\Support\Facades\Storage;
use App\Models\AnimeUser;

class WatchedController extends Controller
{
        public function index()
    {
        $anime = Anime::all();
        return view('watched', compact('anime'));
    }
}