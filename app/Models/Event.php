<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date_start',
        'date_end',
        'location',
        'image',
        'number_places',
        'categories_id',
        'status',
        'users_id',
        'available_places',
    ];


}
