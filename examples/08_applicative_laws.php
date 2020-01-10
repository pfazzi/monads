<?php

declare(strict_types=1);

use function Functional\curry_n;
use Pfazzi\Monads\Applicative;
use Pfazzi\Monads\IdentityApplicative;
use Webmozart\Assert\Assert;

require __DIR__.'/../vendor/autoload.php';

check_applicative_laws(IdentityApplicative::class);

function check_applicative_laws($applicativeClass): void
{
    $id = \Pfazzi\Monads\id;
    $compose = curry_n(2, \Lambdish\Phunctional\compose);
    $pure = fn ($value): Applicative => $applicativeClass::pure($value);

    $x = ' Hello world! ';
    $f = '\trim';

    $applicative = $pure('strtoupper');
    $pure_f = $pure($f);
    $pure_x = $pure($x);

    // Map
    // pure(f)->apply == map(f)

    $map = fn (callable $f) => $pure_x->map($f);

    Assert::true(
        $pure($f)->apply($pure_x) == $map($f),
        'Map law not verified'
    );

    // Identity
    // pure(id)->apply($x) == id($x)

    Assert::true(
        $pure($id)->apply($pure_x) == $id($pure_x),
        'Identity law not verified'
    );

    // Homomorphism
    // pure(f)->apply($x) == pure(f($x))

    Assert::true(
        $pure($f)->apply($pure_x) == $pure($f($x)),
        'Homomorphism law not verified'
    );

    // Interchange
    // pure(f)->apply($x) == pure(fn ($f) => $f($x))->apply(f)

    Assert::true(
        $pure($f)->apply($pure($x)) ==
        $pure(fn ($j) => $j($x))->apply($pure($f)),
        'Interchange law not verified'
    );

    // Composition
    // pure(compose)->apply(f1)->apply(f2)->apply($x) == pure(f1)->apply(pure(f2)->apply($x))

    $pure_f1 = $pure($f1 = '\strtoupper');
    $pure_f2 = $pure($f2 = '\strrev');

    Assert::eq(
        $pure($compose)->apply($pure_f1)->apply($pure_f2)->apply($pure_x)->get(),
        $pure_f1->apply($pure_f2->apply($pure_x))->get(),
        'Composition law not verified'
    );
}
