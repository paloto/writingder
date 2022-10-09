<?php

namespace App\Entity\User;

use App\Trait\ConstantsTrait;

class CategoryType
{
    use ConstantsTrait;

    const NOVEL = 'NOVEL';
    const POETRY = 'POETRY';
    const THEATER = 'THEATER';
    const ESSAY = 'ESSAY';
}