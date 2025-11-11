<?php

declare(strict_types=1);

namespace App\Actions\Bitacora;

use App\Models\Bitacora;

class UpdateBitacora
{
    /**
     * Update the given bitacora data
     *
     * @param  array<mixed,string>  $data
     */
    public function handle(Bitacora $bitacora, array $data): void
    {
        $bitacora->update([
            'day' => $data['day'] ?? $bitacora->day,
            'time_of_test' => $data['time_of_test'] ?? $bitacora->time_of_test,
            'glucose' => $data['glucose'] ?? $bitacora->glucose,
            'condition' => $data['condition'] ?? $bitacora->condition,
            'food' => $data['food'] ?? $bitacora->food,
        ]);

        $bitacora->refresh();
    }
}
