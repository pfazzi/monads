<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use Pfazzi\Monads\Maybe;

/** @var Maybe<string> $hello */
$hello = Maybe::fromValue('Hello World!');

echo $hello->getOrElse('Nothing to see...');
// Hello World !
var_dump($hello->isJust());
// bool(true)
var_dump($hello->isNothing());
// bool(false)

/** @var Maybe<string> $nothing */
$nothing = Maybe::fromValue(null);

echo $nothing->getOrElse('Nothing to see...');
// Nothing to see...
var_dump($nothing->isJust());
// bool(false)
var_dump($nothing->isNothing());
// bool(true)
