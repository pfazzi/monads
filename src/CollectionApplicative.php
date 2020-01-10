<?php

declare(strict_types=1);

namespace Pfazzi\Monads;

use function Lambdish\Phunctional\reduce;
use Webmozart\Assert\Assert;

class CollectionApplicative extends Applicative
{
    private iterable $values;

    public static function pure($values): Applicative
    {
        if (!is_iterable($values)) {
            $values = [$values];
        }

        $instance = new self();

        $instance->values = $values;

        return $instance;
    }

    public function apply(Applicative $applicative): Applicative
    {
        Assert::isInstanceOf($applicative, self::class);

        return $this->pure(reduce(
            fn ($accumulator, callable $f) => array_merge(
                $accumulator,
                array_map($f, $applicative->values)
            ),
            $this->values,
            []
        ));
    }
}
