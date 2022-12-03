<?php

namespace Yungts97\EnumHelpers\Tests\Enums;

use Yungts97\EnumHelpers\Traits\Random;
use Yungts97\EnumHelpers\Traits\Contains;
use Yungts97\EnumHelpers\Traits\Invokable;

enum Size
{
    use Invokable, Contains, Random;

    case Small;
    case Medium;
    case Large;
    case ExtraLarge;
}
