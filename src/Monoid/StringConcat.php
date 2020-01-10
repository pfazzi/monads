<?php

declare(strict_types=1);

namespace Pfazzi\Monads\Monoid;

use Pfazzi\Monads\Monoid;

class StringConcat extends Monoid
{
    public static function id()
    {
        return '';
    }

    public static function op($a, $b)
    {
        return $a.$b;
    }
}
