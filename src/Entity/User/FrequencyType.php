<?php

namespace App\Entity\User;

use App\Trait\ConstantsTrait;

class FrequencyType
{
    use ConstantsTrait;

    const ONCE_A_WEEK = 'ONCE_A_WEEK';
    const THREE_TIMES_A_WEEK = 'THREE_TIMES_A_WEEK';
    const FIVE_TIMES_A_WEEK = 'FIVE_TIMES_A_WEEK';
    const EVERYDAYS = 'EVERYDAYS';
}