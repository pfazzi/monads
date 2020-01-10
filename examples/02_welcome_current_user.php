<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use Pfazzi\Monads\Maybe;

class User
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class AnonymousUser extends User
{
    public function __construct()
    {
        parent::__construct('Guest');
    }
}

function getCurrentUser(): ?User
{
    return null;
}

// Null object pattern solution

$user = getCurrentUser();

if (null === $user) {
    $user = new AnonymousUser();
}

echo sprintf("Welcome %s\n", $user->name);

// Maybe object solution

/** @var Maybe<User> $user */
$user = Maybe::fromValue(getCurrentUser());

echo sprintf(
    "Welcome %s\n",
    $user->getOrElse(new AnonymousUser())->name
);
