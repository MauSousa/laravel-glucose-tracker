<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    /** @use HasFactory<\Database\Factories\BitacoraFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'day', 'time_of_test', 'glucose', 'condition', 'food'];
}
