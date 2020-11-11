<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'description', 'votes', 'published'
    ];

    /**
     * Get the posts for the this category.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
    
}
