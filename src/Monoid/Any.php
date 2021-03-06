<?php

declare(strict_types=1);

namespace Pfazzi\Monads\Monoid;

use Pfazzi\Monads\Monoid;

class Any extends Monoid
{
    public static function id()
    {
        return true;
    }

    public static function op($a, $b)
    {
        return $a || $b;
    }
}
