<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Music;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genre::truncate();
        User::truncate();
        Music::truncate();
        

        $user = User::factory()->create();

         $genre1= Genre::factory()->create();
         $genre2= Genre::factory()->create();

        $music1=Music::factory(5)->create([
        
         'genre_id' => $genre2->id,
         'user_id'=>$user->id,
         
        ]);

        $music2=Music::factory(2)->create([

            'genre_id' => $genre1->id,
            'user_id'=>$user->id,
            
           ]);
   

    }
}
