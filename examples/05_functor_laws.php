<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use function Functional\curry;
use function Lambdish\Phunctional\compose;
use function Pfazzi\Monads\id;
use const Pfazzi\Monads\id;
use Pfazzi\Monads\Maybe;

// Identity
// map(id) = id

$subject = Maybe::fromValue(10);

$map = curry(fn (callable $f, Maybe $maybe) => $maybe->map($f));

var_dump($map(id)($subject) == id($subject));
// true

// Composition
// compose(map(f), map(g)) = map(compose(f, g))

$f = fn (int $i): int => $i + 4;
$g = fn (int $i): int => $i * 2;

var_dump(
    compose($map($f), $map($g))($subject) ==
         $map(compose($f, $g))($subject)
);
// true
