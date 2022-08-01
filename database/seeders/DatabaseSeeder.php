<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(3)->create()
        //     ->each(function($ques){
        //         $ques->questions()
        //             ->saveMany(
        //                 \App\Models\Question::factory(5)->make()
        //             );
        //     });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        User::factory(3)->has(Question::factory()->count(3))->create();

        
    }
}
