<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Articles extends Model
{
    use HasFactory,HasSlug;

    protected $fillable = [
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
         ->generateSlugsFrom('title')
         ->saveSlugsTo('slug');
    }

    // public function imageUrl():string
    // {
    //     return Storage::url($this->image);
    // }

    public function getRouteKeyName():string
    {
         return 'slug';
    }

    public function category(){
         return $this->belongsTo(category::class,'category_id','id');
    }

    public function author(){
         return $this->belongsTo(User::class,'author_id','id');
    }
    
}

