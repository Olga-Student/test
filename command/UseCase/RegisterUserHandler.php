<?php

declare(strict_types=1);

namespace Command\UseCase;

use Command\Command\RegisterUserCommand;
use Command\Contract\CommandHandlerInterface;

class RegisterUserHandler implements CommandHandlerInterface
{
    /**
     * @var RegisterUserCommand
     */
    private $command;

    /**
     * RegisterUser constructor.
     * @param RegisterUserCommand $command
     */
    public function __construct(RegisterUserCommand $command)
    {
        $this->command = $command;
    }

    /**
     * Выполнение команды.
     */
    public function execute(): void
    {
        echo "Регистрируем пользователя с именем " .
            "{$this->command->getUser()->getName()}.\n";
    }
}