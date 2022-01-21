<?php

declare(strict_types=1);

namespace Command\UseCase;

use Command\Command\RegisterUserCommand;
use Command\Command\RemoveUserCommand;
use Command\Contract\CommandHandlerInterface;

class RemoveUserHandler implements CommandHandlerInterface
{
    /**
     * @var RemoveUserHandler
     */
    private $command;

    /**
     * RegisterUser constructor.
     * @param RemoveUserCommand $command
     */
    public function __construct(RemoveUserCommand $command)
    {
        $this->command = $command;
    }

    /**
     * Выполнение команды.
     */
    public function execute(): void
    {
        echo "Удаляем пользователя с именем " .
            "{$this->command->getUser()->getName()}.\n";
    }
}