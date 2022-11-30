<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'excerpt' => Str::limit(strip_tags($this->faker->paragraph()), 100, '..')
,
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                            ->map(fn($body) => "<p>$body</p>")
                            ->implode(''),
            'user_id' => mt_rand(1,5),
            'articlecategory_id' => mt_rand(1,2)
        ];
    }
}
