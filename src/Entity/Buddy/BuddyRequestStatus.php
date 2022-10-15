<?php

namespace App\Entity\Buddy;

use App\Trait\ConstantsTrait;

class BuddyRequestStatus
{
    use ConstantsTrait;

    const SENT = 'SENT';
    const REFUSED = 'REFUSED';
    const ACCEPTED = 'ACCEPTED';
    const EXPIRED = 'EXPIRED';
    const DISCARDED = 'DISCARDED';
}