<?php

declare(strict_types=1);

namespace Command\Contract;

interface CommandHandlerInterface
{
    /**
     * Выполнение команды.
     */
    public function execute(): void;
}