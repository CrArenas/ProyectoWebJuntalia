<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens; // 
use App\Models\Rol;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Inscription;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory; // 

    protected $fillable = ['rol_id', 'name', 'last_name', 'email', 'password', 'phone', 'birth_date'];

    public function role()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
    
    public function events()
    {
        return $this->hasMany(Event::class, 'user_id');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
    
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'user_id');
    }

    

}





/*
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Rol;









ANTES DE LAS GRAFICAS

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['rol_id', 'name', 'last_name', 'email', 'password', 'phone', 'birth_date'];

    public function role()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}*/