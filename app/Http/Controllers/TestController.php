<?php

namespace App\Http\Controllers;

use App\Http\Resources\MusicResource;
use App\Models\Music;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
       $musics = Music::all();
       return $musics;
    }

    public function show(Music $music)
    {
       //$music = Music::find($id);
       return  new MusicResource($music);
    }
}
