<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\City;
use App\Models\Inscription;
use App\Models\Comment;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'category_id', 
        'city_id', 
        'name', 
        'description', 
        'event_date', 
        'event_time', 
        'age_restriction', 
        'cost', 
        'status', 
        'pets', 
        'address',
        'lat',
        'lng'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    /*MODELO ANTES DEL DELETE DE USERS

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
        */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'event_id');
    }
    
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'event_id');
    }   
}