<?php

namespace App\Entity\User;

use App\Trait\ConstantsTrait;

class AgeRangeType
{
    use ConstantsTrait;

    const TO_18 = 'TO_18';
    const FROM_18_TO_22 = 'FROM_18_TO_22';
    const FROM_23_TO_28 = 'FROM_23_TO_28';
    const FROM_29_TO_37 = 'FROM_29_TO_37';
    const FROM_38_TO_50 = 'FROM_38_TO_50';
    const FROM_51_TO_70 = 'FROM_51_TO_70';
    const FROM_71 = 'FROM_71';
}