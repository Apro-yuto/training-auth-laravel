<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_name',
        'book_image',
        'book_description',
        'book_author',
    ];

    public function Reads()
    {
        return $this->belongsToMany(Read::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
