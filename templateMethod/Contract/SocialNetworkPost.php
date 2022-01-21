<?php

declare(strict_types=1);

namespace TemplateMethod\Contract;

/**
 * Абстрактный Класс определяет метод шаблона post и объявляет все шаги для
 * того, чтобы сделать пост в некоторой социальной сети. Здесь не описывается
 * какая это будет сеть, как с ней соединиться и запостить, в методе post
 * определяется алгоритм действий, а какие конкретно действия будут сделаны,
 * какая будет соц. сеть, зависит от потомков этого абстрактного класса.
 */
abstract class SocialNetworkPost
{
    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $password;

    /**
     * SocialNetwork constructor.
     * @param string $login
     * @param string $password
     */
    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * Описываем порядок опубликования поста в социальной сети.
     * Наследники будут описывать методы, в которых уже будут описаны конкретные
     * действия для работы с конкретной соц. сетью.
     * @param string $message
     * @return bool
     */
    final public function post(string $message): bool
    {
        // Аутентифицируемся на сайте.
        if (!$this->logIn($this->login, $this->password)) {
            return false;
        }

        // Хук, можно переопределить логику того что надо сделать после входа.
        $this->afterLogin();

        // Отправляем запрос на добавление поста.
        $result = $this->sendPost($message);

        // Хук, можно переопределить логику того что надо сделать после отправки
        // поста в соц. сеть.
        $this->afterSendPost();

        // Выходим из соц. сети.
        $this->logOut();

        // Хук, можно переопределить логику того что надо сделать после выхода.
        $this->afterLogout();

        // Возвращаем результат публикации поста.
        return $result;
    }

    /**
     * Аутентификация в соц. сети. Реализация перекладывается на потомков
     * класса.
     * @param string $login
     * @param string $password
     * @return bool
     */
    abstract protected function logIn(string $login, string $password): bool;

    /**
     * Отправка поста в соц. сеть. Реализация перекладывается на потомков
     * класса.
     * @param string $message
     * @return bool
     */
    abstract protected function sendPost(string $message): bool;

    /**
     * Выход из соц. сети. Реализация перекладывается на потомков класса.
     */
    abstract protected function logOut(): void;

    /**
     * Хук для того чтобы сделать что-то после входа. Переопределяется в
     * наследнике.
     */
    protected function afterLogin(): void
    {
    }

    /**
     * Хук для того чтобы сделать что-то после отправки поста. Переопределяется
     * в наследнике.
     */
    protected function afterSendPost(): void
    {
    }

    /**
     * Хук для того чтобы сделать что-то после выхода. Переопределяется в
     * наследнике.
     */
    protected function afterLogout(): void
    {
    }
}