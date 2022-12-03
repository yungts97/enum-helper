<?php

namespace Yungts97\EnumHelpers\Traits;

use BackedEnum;
use Yungts97\EnumHelpers\Exceptions\UndefinedCaseError;

trait Invokable
{
    /** Return the enum's value when it's $invoked(). */
    public function __invoke()
    {
        return $this instanceof BackedEnum ? $this->value : $this->name;
    }

    /** Return the enum's value or name when it's called ::STATICALLY(). */
    public static function __callStatic($name, $args)
    {
        $cases = static::cases();
        foreach ($cases as $case) {
            if ($case->name === $name) {
                return $case instanceof BackedEnum ? $case->value : $case->name;
            }
        }

        throw new UndefinedCaseError(static::class, $name);
    }
}
