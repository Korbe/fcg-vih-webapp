<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:m.d.Y H:i:s',
        'updated_at' => 'datetime:m.d.Y H:i:s',
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str::slug($value);
    }

/*    public function getCreatedAtAttribute($date): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.Y');
    }*/
    /*
        public function getUpdatedAtAttribute($date): string
        {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.Y');
        }*/

    /**
     * Get the page this model belongs to
     *
     * @return BelongsTo|User
     */
    public function user() {
        return $this->belongsTo( User::class );
    }
}
