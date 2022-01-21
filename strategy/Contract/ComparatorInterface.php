<?php

declare(strict_types=1);

namespace Strategy\Contract;

interface ComparatorInterface
{
    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function compare(ComparatorableInterface $a, ComparatorableInterface $b): int;
}