<?php

declare(strict_types=1);

namespace Pfazzi\Monads;

/**
 * @template T
 * @psalm-pure
 *
 * @param T $value
 *
 * @return T
 */
function id($value)
{
    return $value;
}

const id = __NAMESPACE__.'\id';

/**
 * @psalm-pure
 * @psalm-suppress MissingClosureReturnType
 * @psalm-suppress ImpureFunctionCall
 */
function liftMaybe(callable $f): callable
{
    return function () use ($f) {
        $innerArgs = array_map(
            fn (Maybe $maybe) => $maybe->getOrElse(null),
            \func_get_args()
        );

        if (\in_array(null, $innerArgs, true)) {
            return Maybe::nothing();
        }

        return Maybe::just($f(...$innerArgs));
    };
}
