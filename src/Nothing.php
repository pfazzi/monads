<?php

declare(strict_types=1);

namespace Pfazzi\Monads;

/**
 * @psalm-immutable
 */
final class Nothing extends Maybe
{
    private static ?self $instance = null;

    private function __construct()
    {
    }

    /**
     * @psalm-pure
     */
    public static function get(): self
    {
        return self::$instance ??= new self();
    }

    public function isJust(): bool
    {
        return false;
    }

    public function isNothing(): bool
    {
        return true;
    }

    public function getOrElse($default)
    {
        return $default;
    }

    public function map(callable $f): Maybe
    {
        return $this;
    }

    public function orElse(Maybe $m): Maybe
    {
        return $m;
    }

    public function flatMap(callable $f): Maybe
    {
        return $this;
    }

    public function filter(callable $f): Maybe
    {
        return $this;
    }
}
