<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'author',
        'published_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime:d.m.Y H:i:s',
        'created_at' => 'datetime:d.m.Y H:i:s',
        'updated_at' => 'datetime:d.m.Y H:i:s',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photos');
        $this->addMediaCollection('audio');
    }
}
