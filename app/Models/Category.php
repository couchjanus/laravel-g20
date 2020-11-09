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

    // protected $table = 'categories';
    // protected $fillable = ['name', 'description', 'votes']; 
    // protected $dates = ['created_at', 'deleted_at']; // which fields will be Carbon-ized
    // protected $primaryKey = 'id'; // это не обязательно должен быть поле "id"
    // public $incrementing = false; // не обязательно должно быть автоинкрементным
    // protected $perPage = 25; // изменить счетчик пагинации в модели (по умолчанию: 15)
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at'; // Да, эти поля тоже можно менять
    // public $timestamps = false; // можно указать что мы вообще не используем поля created_at и updated_at

    
}
