<?php

namespace App\Entity\User;

use App\Trait\ConstantsTrait;

class TopicType
{
    use ConstantsTrait;

    const FANTASY = 'FANTASY';
    const SCI_FI = 'SCI_FI';
    const ROMANCE = 'ROMANCE';
    const DRAMA = 'DRAMA';
    const HISTORICAL_FICTION = 'HISTORICAL_FICTION';
    const DETECTIVE = 'DETECTIVE';
    const MYSTERIES = 'MYSTERIES';
    const HORROR = 'HORROR';
    const CHILDRENS = 'CHILDRENS';
    const COMEDY = 'COMEDY';
    const ADVENTURE = 'ADVENTURE';
    const THRILLERS = 'THRILLERS';
    const WESTERNS = 'WESTERNS';
    const OTHER = 'OTHER';

    /*const NOVEL = [
        self::FANTASY,
        self::SCI_FI,
        self::ROMANCE,
        self::DRAMA,
        self::HISTORICAL_FICTION,
        self::DETECTIVE,
        self::MYSTERIES,
        self::HORROR,
        self::CHILDRENS,
        self::COMEDY,
        self::ADVENTURE,
        self::THRILLERS,
        self::WESTERNS,
    ];

    const POETRY = [
        self::FANTASY,
        self::SCI_FI,
        self::ROMANCE,
        self::DRAMA,
        self::DETECTIVE,
        self::MYSTERIES,
        self::HORROR,
        self::CHILDRENS,
        self::COMEDY,
        self::ADVENTURE,
    ];

    const THEATER = [
        self::FANTASY,
        self::SCI_FI,
        self::ROMANCE,
        self::DRAMA,
        self::HISTORICAL_FICTION,
        self::DETECTIVE,
        self::MYSTERIES,
        self::HORROR,
        self::CHILDRENS,
        self::COMEDY,
        self::ADVENTURE,
        self::THRILLERS,
        self::WESTERNS,
    ];

    const ESSAY = [
        self::OTHER,
    ];*/
}