<?php

declare(strict_types=1);

use Pfazzi\Monads\CollectionApplicative;

require __DIR__.'/../vendor/autoload.php';

print_r(
    CollectionApplicative::pure([
        fn ($a) => $a * 2,
        fn ($a) => $a + 10,
    ])->apply(CollectionApplicative::pure([1, 2, 3]))
);
