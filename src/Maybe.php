<?php

declare(strict_types=1);

namespace Pfazzi\Monads;

/**
 * @template T
 */
abstract class Maybe implements Functor
{
    /**
     * @template X
     * @psalm-pure
     *
     * @param X     $value
     * @param mixed $nullValue
     *
     * @return Maybe<X>
     */
    public static function fromValue($value, $nullValue = null): self
    {
        if ($value === $nullValue) {
            return self::nothing();
        }

        return self::just($value);
    }

    /**
     * @template H
     * @psalm-pure
     *
     * @param H $value
     *
     * @return Just<H>
     */
    public static function just($value): Just
    {
        return new Just($value);
    }

    /**
     * @psalm-pure
     */
    public static function nothing(): Nothing
    {
        return Nothing::get();
    }

    abstract public function isJust(): bool;

    abstract public function isNothing(): bool;

    /**
     * Returns the current value if there is one, or the given value if it was Nothing.
     *
     * @psalm-pure
     *
     * @param T $default
     *
     * @return T
     */
    abstract public function getOrElse($default);

    /**
     * Returns the current value if there is one, or the given value if it was Nothing.
     * This allows us to easily get data from multiple possible sources.
     *
     * @param Maybe<T> $m
     *
     * @return Maybe<T>
     */
    abstract public function orElse(self $m): self;

    /**
     * Applies a callable to our value but does not wrap it inside a Maybe class.
     * It is the responsibility of the callable to return a Maybe class itself.
     *
     * @template K
     *
     * @param callable(T):Maybe<K> $f
     *
     * @return Maybe<K>
     */
    abstract public function flatMap(callable $f): self;

    /**
     * Applies the given predicate to the value. If the predicate returns true value,
     * we keep the value; otherwise, we return the value Nothing.
     *
     * @param callable(T):bool $f
     *
     * @return Maybe<T>
     */
    abstract public function filter(callable $f): self;
}
