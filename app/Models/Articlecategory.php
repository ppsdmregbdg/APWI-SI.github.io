<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articlecategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
