<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['title', 'description'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('title_image')->singleFile();
        $this->addMediaCollection('support_image')->singleFile();
    }
}
