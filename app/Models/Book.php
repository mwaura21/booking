<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable = [
        'name', 'start_date', 'end_date', 'available'
    ];
}
