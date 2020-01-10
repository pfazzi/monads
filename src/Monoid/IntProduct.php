<?php

declare(strict_types=1);

namespace Pfazzi\Monads\Monoid;

use Pfazzi\Monads\Monoid;

class IntProduct extends Monoid
{
    public static function id()
    {
        return 1;
    }

    public static function op($a, $b)
    {
        return $a * $b;
    }
}
