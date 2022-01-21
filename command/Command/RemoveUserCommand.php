<?php

declare(strict_types=1);

namespace Command\Command;

use Command\Contract\UserCommandInterface;
use Command\Entity\User;

class RemoveUserCommand implements UserCommandInterface
{
    /**
     * @var User
     */
    private $user;

    /**
     * RegisterUser constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}