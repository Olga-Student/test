<?php

declare(strict_types=1);

namespace Command\Contract;

use Command\Entity\User;

interface UserCommandInterface
{
    /**
     * Выполнение команды.
     */
    public function getUser(): User;
}