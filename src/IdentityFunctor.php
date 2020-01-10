<?php

declare(strict_types=1);

namespace Pfazzi\Monads;

/**
 * @template T
 * @psalm-immutable
 */
class IdentityFunctor implements Functor
{
    /**
     * @var T
     */
    private $value;

    /**
     * @param T $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @template K
     * @psalm-pure
     *
     * @param K $value
     *
     * @return self<K>
     */
    public static function fromValue($value): self
    {
        return new self($value);
    }

    public function map(callable $f): self
    {
        return new self($f($this->value));
    }

    /**
     * @return T
     */
    public function get()
    {
        return $this->value;
    }
}
