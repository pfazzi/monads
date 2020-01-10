<?php

declare(strict_types=1);

use Pfazzi\Monads\Monoid\All;
use Pfazzi\Monads\Monoid\Any;
use Pfazzi\Monads\Monoid\ArrayMerge;
use Pfazzi\Monads\Monoid\IntProduct;
use Pfazzi\Monads\Monoid\IntSum;
use Pfazzi\Monads\Monoid\None;
use Pfazzi\Monads\Monoid\StringConcat;
use Webmozart\Assert\Assert;

require __DIR__.'/../vendor/autoload.php';

check_monoid_laws(IntSum::class, 1, 2, 3);
check_monoid_laws(IntProduct::class, 1, 2, 3);
check_monoid_laws(StringConcat::class, 'Hello', ' ', 'world!');
check_monoid_laws(ArrayMerge::class, [1, 2], [3, 4], [5, 6]);
check_monoid_laws(Any::class, true, false, true);
check_monoid_laws(All::class, true, false, true);
check_monoid_laws(None::class, true, false, true);

function check_monoid_laws($monoidClass, $a, $b, $c): void
{
    $id = $monoidClass::id();
    $op = fn ($a, $b) => $monoidClass::op($a, $b);

    // Identity
    // a op id = a

    Assert::eq($op($a, $id), $a, 'Identity law');

    // Associativity
    // (a op b) op c = a op (b op c)

    Assert::eq(
        $op($op($a, $b), $c),
        $op($a, $op($b, $c)),
        'Associativity law'
    );
}
