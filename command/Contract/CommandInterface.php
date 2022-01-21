<?php

declare(strict_types=1);

namespace Command\Contract;

interface CommandInterface
{
    /**
     * Выполнение команды.
     */
    public function execute(): void;
}