<?php

declare(strict_types=1);

namespace TemplateMethod\Networks;

use TemplateMethod\Contract\SocialNetworkPost;

/**
 * Класс для работы с Facebook.
 */
class FacebookPost extends SocialNetworkPost
{
    /**
     * Аутентификация в соц. сети. Реализация перекладывается на потомков
     * класса.
     * @param string $login
     * @param string $password
     * @return bool
     */
    protected function logIn(string $login, string $password): bool
    {
        echo "Аутентифицируемся в Facebook. Login: $login, Password: " .
            "$password\n";
        echo "Аутентификация прошла успешно.\n";
        return true;
    }

    /**
     * Отправка поста в соц. сеть. Реализация перекладывается на потомков
     * класса.
     * @param string $message
     * @return bool
     */
    protected function sendPost(string $message): bool
    {
        echo "Пост с сообщением $message успешно отправлен в Facebook.\n";
        return true;
    }

    /**
     * Выход из соц. сети. Реализация перекладывается на потомков класса.
     */
    protected function logOut(): void
    {
        echo "Выход из аккаунта Facebook успешно завершен.\n";
    }

    /**
     * @inheritDoc
     */
    protected function afterLogin(): void
    {
        echo "Делаем дополнительную логику после входа в FaceBook.\n";
    }
}