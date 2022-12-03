<?php

namespace Yungts97\EnumHelpers\Traits;

use UnitEnum;
use BackedEnum;

trait Contains
{
    public static function contains(BackedEnum|UnitEnum|string|int $case)
    {
        if ($case instanceof BackedEnum) return !is_null(self::tryFrom($case->value));
        if ($case instanceof UnitEnum) return in_array($case->name, array_column(self::cases(), "name"));

        return method_exists(self::class, 'tryFrom') ?
            !is_null(self::tryFrom($case)) :
            in_array($case, array_column(self::cases(), "name"));
    }
}
