<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

          Listing::factory(6)->create();


        // $user = User::factory()->create([
        //     'name' => 'Vipul',
        //     'email' => 'vipul@gmail.com'
        // ]);

        // Listing::factory(6)->create([
        //     'user_id' => $user->id
        // ]);





        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    // Listing::create([
    //     'title' => 'Krunal Developer',
    //             'tags' => 'laravel,javascript',
    //             'company' => 'Alice Infoweb',
    //             'location' => 'Ahmedabad',
    //             'email' => 'krunal@gmail.com',
    //             'website' => 'https://meptech.in/',
    //             'description' => 'We are working hard to finish the development of this site.'
    // ]);

    // Listing::create([
    //     'title' => 'Navya Developer',
    //     'tags' => 'laravel,javascript,API',
    //     'company' => 'Navya Infoweb',
    //     'location' => 'New York',
    //     'email' => 'navya@gmail.com',
    //     'website' => 'https://navya.com/',
    //     'description' => 'Navya Description'
    // ]);


    }

}
