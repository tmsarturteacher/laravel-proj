<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Test extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'tests';

    protected $fillable = [
        'name'
    ];

    protected $guarded = [
        'id'
    ];

    public $timestamps = false;


}
