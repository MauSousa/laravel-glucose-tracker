<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bitacora extends Model
{
    /** @use HasFactory<\Database\Factories\BitacoraFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'day', 'time_of_test', 'glucose', 'condition', 'food'];

    protected $casts = [
        'day' => 'date:d-m-Y',
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
    ];

    /**
     * Get the user that belongs the bitacora
     *
     * @return BelongsTo<User,$this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
