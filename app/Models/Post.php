<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'title', 'content', 'category_id', 'user_id', 'status', 'votes', 'cover', 'published_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'seen_at',
        'published_at'
    ];
    
    public function sluggable()    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
 
    // По умолчанию используется поле deleted_at. Изменить название можно, определив свойство DELETED_AT.
    const DELETED_AT = 'deleted_at';
    // или
    public function getDeletedAtColumn()
    {
        return 'deleted_at';
    }


    /**
     * Get the post title.
     *
     * @param  string  $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }
     
    /**
     * Set the post title.
     *
     * @param  string  $value
     * @return string
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }

    public function user()
    {
       return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
       return $this->belongsTo('App\Models\Category');
    }

    public function tags()  {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function getDescriptionAttribute()   {
        return substr($this->content, 0, 70) . "...";
    }
 
    public function getShortTitleAttribute()   {
        return substr($this->title, 0, 30);
    }
    
}
