<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Available extends Model
{
    use HasFactory;

    protected $table = 'available';

    protected $fillable = [
        'start_date', 'end_date'
    ];
}
