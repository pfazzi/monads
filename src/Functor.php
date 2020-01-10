<?php

declare(strict_types=1);

namespace Pfazzi\Monads;

/**
 * @template T
 * @template K
 * @psalm-immutable
 */
interface Functor
{
    /**
     * @param callable(T):K $f
     *
     * @return static
     */
    public function map(callable $f): self;
}
