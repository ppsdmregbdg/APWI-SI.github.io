<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Articlecategory;
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
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        // User::create([
        //     'name' => 'Admin 2',
        //     'username' => 'admin2',
        //     'email' => 'admin2@gmail.com',
        //     'password' => bcrypt('12345678')
        // ]);
        
        // User::factory(5)->create();
        
        // Article::factory(20)->create();
        
        Articlecategory::create([
            'name' => 'Pelatihan Kepemimpinan',
            'slug' => 'pelatihan-kepemimpinan'
        ]);

        Articlecategory::create([
            'name' => 'Pelatihan Keanggotaan',
            'slug' => 'pelatihan-keanggotaan'
        ]);
    }
}
