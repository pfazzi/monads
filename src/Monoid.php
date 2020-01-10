<?php

declare(strict_types=1);

namespace Pfazzi\Monads;

use function Lambdish\Phunctional\reduce;

abstract class Monoid
{
    public function __invoke(...$args)
    {
        switch (\count($args)) {
            case 0: throw new \RuntimeException('Expected at least one parameter');
            case 1: return fn ($b) => static::op($args[0], $b);
            default: return static::concat($args);
        }
    }

    abstract public static function id();

    abstract public static function op($a, $b);

    public static function concat(array $values)
    {
        $class = \get_called_class();

        return reduce([$class, 'op'], $values, [$class, 'id']());
    }
}
