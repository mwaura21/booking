<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Available extends Model
{
    use HasFactory;

    protected $table = 'available';
    protected $fillable = ['date_id', 'start_time', 'end_time'];
    protected $dates = ['start_time', 'end_time'];
}
