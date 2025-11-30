<?php

declare(strict_types=1);

namespace App\Enums;

enum Condition: string
{
    case Ayuno = 'Ayuno';

    case Desayuno = 'Desayuno';

    case Comida = 'Comida';

    case Cena = 'Cena';
}
