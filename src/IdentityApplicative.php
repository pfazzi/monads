<?php

declare(strict_types=1);

namespace Pfazzi\Monads;

use Webmozart\Assert\Assert;

/**
 * @template T
 */
class IdentityApplicative extends Applicative
{
    /**
     * @var T
     */
    private $value;

    protected function __construct($value)
    {
        $this->value = $value;
    }

    public static function pure($value): Applicative
    {
        return new self($value);
    }

    public function apply(Applicative $applicative): Applicative
    {
        Assert::isInstanceOf($applicative, self::class);
        Assert::isCallable($f = $this->get());

        return static::pure($f($applicative->get()));
    }

    public function get()
    {
        return $this->value;
    }
}
