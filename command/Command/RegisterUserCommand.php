<?php

declare(strict_types=1);

namespace Command\Command;

use Command\Contract\UserCommandInterface;
use Command\Entity\User;

class RegisterUserCommand implements UserCommandInterface
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
    /**
     * @return User
     */
    public function getyser(): User
    {
        return $this->user;
    }

}