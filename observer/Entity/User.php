<?php

declare(strict_types=1);

namespace Observer\Entity;

use SplObjectStorage;
use SplObserver;
use SplSubject;

class User implements SplSubject
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var SplObjectStorage
     */
    private $observers;

    /**
     * UserObserver constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->observers = new SplObjectStorage();
    }

    /**
     * @inheritDoc
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * @inheritDoc
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * @inheritDoc
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function changeName(string $name): void
    {
        $this->name = $name;
        $this->notify();
    }
}