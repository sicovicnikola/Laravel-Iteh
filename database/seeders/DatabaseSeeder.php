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
        

        Music::factory(5)->create();

        // $user = User::factory()->create();

        // $genre1= Genre::create(['name'=>'Pop', 'description'=>'Pop music']);
        // $genre2= Genre::create(['name'=>'Folk', 'description'=>'Folk music']);

        // $music1=Music::create([
        //  'title'=>'Burbon',
        //  'author'=> 'Aca Lukas',
        //  'duration'=> "3:14",
        //  'genre_id' => $genre2->id,
        //  'user_id'=>$user->id,
        //  'published'=> '2006'
        // ]);

        // $music2=Music::create([
        //     'title'=>'Zlatno dete',
        //     'author'=> 'Coby',
        //     'duration'=> "3:11",
        //     'genre_id' => $genre1->id,
        //     'user_id'=>$user->id,
        //     'published'=> '2022'
        //    ]);
   

    }
}
