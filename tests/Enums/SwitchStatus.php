<?php

namespace Yungts97\EnumHelpers\Tests\Enums;

use Yungts97\EnumHelpers\Traits\Random;
use Yungts97\EnumHelpers\Traits\Contains;
use Yungts97\EnumHelpers\Traits\Invokable;

enum SwitchStatus: int
{
    use Invokable, Contains, Random;

    case On = 1;
    case Off = 0;
}
