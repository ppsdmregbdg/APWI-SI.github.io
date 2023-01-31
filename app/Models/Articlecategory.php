<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Article;
use App\Models\Elearning;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articlecategory extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function elearnings()
    {
        return $this->hasMany(Elearning::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
