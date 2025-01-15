<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // You can specify which fields are mass assignable.
    protected $fillable = [
        'title',
        'author',
        'genre',
        'year',
        'description',
        'coverimage'
    ];
}