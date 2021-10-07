<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Read extends Model
{
    use HasFactory;
    protected $fillable = [
        'read_title',
        'read_time',
        'read_thought',
    ];

    public function Books()
    {
        return $this->belongsToMany(Book::class);
    }
}
