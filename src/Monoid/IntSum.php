<?php

declare(strict_types=1);

namespace Pfazzi\Monads\Monoid;

use Pfazzi\Monads\Monoid;

class IntSum extends Monoid
{
    public static function id()
    {
        return 0;
    }

    public static function op($a, $b)
    {
        return $a + $b;
    }
}
