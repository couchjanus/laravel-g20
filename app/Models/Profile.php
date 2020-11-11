<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'location',
        'bio',
    ];

    public function getFullNameAttribute()
    {
        return $this->last_name." ".$this->first_name;
    }

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User', 'foreign_key');
    // }

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User', 'foreign_key', 'owner_key');
    // }

}
