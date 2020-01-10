<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use function Pfazzi\Monads\liftMaybe;
use Pfazzi\Monads\Maybe;

$add = fn (float $a, float $b): float => $a + $b;
$liftedAdd = liftMaybe($add);

var_dump($liftedAdd(
    Maybe::fromValue(2),
    Maybe::fromValue(5)
)->getOrElse(0));

var_dump($liftedAdd(
    Maybe::fromValue(2),
    Maybe::fromValue(null)
)->getOrElse(0));
