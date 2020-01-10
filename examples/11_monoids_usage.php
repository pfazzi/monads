<?php
declare(strict_types=1);

use Pfazzi\Monads\Monoid\IntSum;
use Pfazzi\Monads\Monoid\StringConcat;

require __DIR__ . '/../vendor/autoload.php';

echo IntSum::concat([3, 5, 6]); // 14

echo StringConcat::concat(['Hello', ' ', 'world!']); // Hello world!

