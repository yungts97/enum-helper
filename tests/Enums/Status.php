<?php

namespace Yungts97\EnumHelpers\Tests\Enums;

use Yungts97\EnumHelpers\Traits\Random;
use Yungts97\EnumHelpers\Traits\Contains;
use Yungts97\EnumHelpers\Traits\Invokable;

enum Status: string
{
    use Invokable, Contains, Random;

    case Draft = 'draft';
    case Submitted = 'submitted';
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
}
