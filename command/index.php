<?php
namespace Command;

use Command\Command\RegisterUserCommand;
use Command\Command\RemoveUserCommand;
use Command\UseCase\RegisterUserHandler;
use Command\Entity\User;
use Command\UseCase\RemoveUserHandler;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^Command/', '', $className);
    require_once __DIR__ . $className . '.php';
});
$user = new User('Игорь');
$registerCommand = new RegisterUserCommand($user);
$removeCommand = new RemoveUserCommand($user);


// Данную команду можно выполнить здесь или положить команду в очередь для
// выполнения данной команды не в данном скрипте, а в отдельном.
(new RegisterUserHandler($registerCommand))->execute();
(new RemoveUserHandler($removeCommand))->execute();
