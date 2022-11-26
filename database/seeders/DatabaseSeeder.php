<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'category_id' => 1,
            'title' => 'Judul Satu',
            'slug' => 'judul-satu',
            'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
        ]);
        Article::create([
            'category_id' => 2,
            'title' => 'Judul Dua',
            'slug' => 'judul-dua',
            'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
        ]);
        Article::create([
            'category_id' => 1,
            'title' => 'Judul Tiga',
            'slug' => 'judul-tiga',
            'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'body' => 'but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',
        ]);

        Category::create([
            'name' => 'Pelatihan Kepemimpinan',
            'slug' => 'pelatihan-kepemimpinan'
        ]);

        Category::create([
            'name' => 'Pelatihan Keanggotaan',
            'slug' => 'pelatihan-keanggotaan'
        ]);
    }
}
