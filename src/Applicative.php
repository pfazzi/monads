<?php

declare(strict_types=1);

namespace Pfazzi\Monads;

abstract class Applicative implements Functor
{
    /**
     * Returns a new Applicative from any value.
     *
     * @param mixed $value
     */
    abstract public static function pure($value): self;

    /**
     * Applies the stored function to the given parameter.
     */
    abstract public function apply(self $applicative): self;

    public function map(callable $f): self
    {
        return $this->pure($f)->apply($this);
    }
}
