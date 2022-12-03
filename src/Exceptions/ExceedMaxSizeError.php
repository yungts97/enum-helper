<?php

namespace Yungts97\EnumHelpers\Exceptions;

use Error;

class ExceedMaxSizeError extends Error
{
    public function __construct(string $enum)
    {
        parent::__construct("$enum exceeded maximum size of case.");
    }
}
