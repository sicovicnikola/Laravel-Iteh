<?php

namespace App\Http\Controllers;

use App\Http\Resources\MusicCollection;
use App\Http\Resources\MusicResource;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MusicController extends Controller
{
   public function index()
   {
      $musics = Music::all();
      return  new MusicCollection($musics);
   }

   public function show(Music $music)
   {
      //$music = Music::find($id);
      return  new MusicResource($music);
   }

   public function store(Request $request)
   {
      
      $validator = Validator::make($request->all(), [

         'title' => 'required|string|max:255',
         'author' => 'required|string|max:255',
         'duration' => 'required|integer',
         'published' => 'required|integer',
         'genre_id' => 'required'
      ]);

      if ($validator->fails()) {
         return response()->json($validator->errors());
         //return ['ggg'];
      }

      $music = Music::create([

         'title' => $request->title,
         'author' => $request->author,
         'duration' => $request->duration,
         'published' => $request->published,
         'genre_id' => $request->genre_id,
         'user_id' => Auth::user()->id


      ]);


      return response()->json(['Pesma je uspešno dodata!', new MusicResource($music)]);
   }


   public function update(Request $request, Music $music)
   {
      $validator = Validator::make($request->all(), [

         'title' => 'required|string|max:255',
         'author' => 'required|string|max:255',
         'duration' => 'required|integer',
         'published' => 'required|integer',
         'genre_id' => 'required'
      ]);

      if ($validator->fails()) {
         return response()->json($validator->errors());
      }

      $music->title = $request->title;
      $music->author = $request->author;
      $music->duration = $request->duration;
      $music->published = $request->published;
      $music->genre_id = $request->genre_id;

      $music->save();


      return response()->json(['Podaci su uspešno ažurirani.', neW MusicResource($music)]);
   }

   public function destroy(Music $music)
   {
     $music->delete();

     return response()->json('Uspešno je obrisano.');
   }
}
