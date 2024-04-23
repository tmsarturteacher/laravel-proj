<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'article', 'user_id'
    ];

    public function user()
    {
//        return $this->hasOne(User::class, 'id', 'user_id');
        return $this->hasMany(User::class, 'id', 'user_id');
//        return $this->belongsTo(User::class, 'user_id', 'id', 'news_users');
    }
}
