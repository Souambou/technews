<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Articles extends Model
{
    use HasFactory HasSlug;

    protected $fillable[
        'title',
        'slug',
        'image',
        'description',
        'isActive',
        'isComment', 
        'isSharable',

         'category_id',
         'author_id'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
        ->generateSlugsFrom('name')
        ->saveSlugsTo('slug');
    }

    public function getRouteKey():string

    {   
        return 'slug';
    }
}
