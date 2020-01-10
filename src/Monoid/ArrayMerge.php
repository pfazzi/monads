<?php

declare(strict_types=1);

namespace Pfazzi\Monads\Monoid;

use Pfazzi\Monads\Monoid;

class ArrayMerge extends Monoid
{
    public static function id()
    {
        return [];
    }

    public static function op($a, $b)
    {
        return array_merge($a, $b);
    }
}
