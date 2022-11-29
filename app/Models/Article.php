<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Articlecategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['articlecategory', 'user'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('title', 'like', '%' . $search . '%')
                             ->orWhere('body', 'like', '%' . $search . '%');
             });
         });

        $query->when($filters['articlecategory'] ??  false, function($query, $articlecategory){
            return $query->whereHas('articlecategory', function($query) use ($articlecategory){
                $query->where('slug', $articlecategory);
            });
        });
    }
    public function articlecategory()
    {
        return $this->belongsTo(Articlecategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
