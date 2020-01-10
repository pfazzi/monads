<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use Pfazzi\Monads\Maybe;

/** @var Maybe<int> $num */
$num = Maybe::fromValue(20);

$val = $num->map(fn (int $n): int => $n * 2)
           ->filter(fn (int $n): bool => $n < 80)
           ->map(fn (int $n): int => $n + 10)
           ->orElse(Maybe::fromValue(99))
           ->map(fn (int $n): float => $n / 3)
           ->getOrElse(0);

var_dump($val);
