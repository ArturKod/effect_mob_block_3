<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];
    public $timestamps = false;

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = password_hash($value, PASSWORD_DEFAULT);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}