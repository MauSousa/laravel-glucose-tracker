<?php

declare(strict_types=1);

namespace App\Actions\Bitacora;

use App\Models\Bitacora;
use App\Models\User;

class CreateBitacora
{
    /**
     * Creates a new bitacora for the given user
     *
     * @param  array<mixed,string>  $data
     */
    public function handle(User $user, array $data): Bitacora
    {
        return $user->bitacora()->create($data);
    }
}
