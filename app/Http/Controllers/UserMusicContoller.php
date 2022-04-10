<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class UserMusicContoller extends Controller
{
    public function index($user_id)
    {
         $musics = Music::get()->where('user_id', $user_id);
         if(is_null($musics)){
            return response()->json('Podaci nisu pronadjeni!', 404);
    }

     return response()->json($musics);
}

}