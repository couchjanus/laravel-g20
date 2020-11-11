<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'category_id', 'user_id', 'status', 'votes'
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

    
}
