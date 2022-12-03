<?php

namespace Yungts97\EnumHelpers\Traits;

use UnitEnum;
use Yungts97\EnumHelpers\Exceptions\ExceedMaxSizeError;

trait Random
{
    public static function random(int $number = 1): UnitEnum|array
    {
        $cases = self::cases();
        if ($number > count($cases)) throw new ExceedMaxSizeError(static::class);
        if ($number === 1) return $cases[array_rand($cases)];

        $randKeys = array_rand($cases, $number);
        $randCases = [];
        foreach ($randKeys as $key) {
            $randCases[] = $cases[$key];
        }
        return $randCases;
    }
}
