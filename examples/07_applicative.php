<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use function Functional\curry;
use Pfazzi\Monads\IdentityApplicative;

$add = curry(fn (float $i, float $j): float => $i + $j);

$five = IdentityApplicative::pure(5);
$ten = IdentityApplicative::pure(10);
$applicative = IdentityApplicative::pure($add);

echo $applicative->apply($five)->apply($ten)->get();
// 15

$hello = IdentityApplicative::pure('Hello world!');

echo IdentityApplicative::pure('strtoupper')->apply($hello)->get();
// HELLO WORLD!
