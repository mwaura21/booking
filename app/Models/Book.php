<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $fillable = ['name', 'start', 'end', 'available'];
    protected $dates = ['start', 'end'];
}
