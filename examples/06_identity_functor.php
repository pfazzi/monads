<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use Pfazzi\Monads\IdentityFunctor;

$four = IdentityFunctor::fromValue(4);

var_dump($four->map(fn (int $n): int => $n + 2));
// IdentityFunctor(6)
