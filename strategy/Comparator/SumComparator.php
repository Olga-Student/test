<?php

declare(strict_types=1);

namespace Strategy\Comparator;

use Strategy\Contract\ComparatorableInterface;
use Strategy\Contract\ComparatorInterface;

class SumComparator implements ComparatorInterface
{
    /**
     * @param ComparatorableInterface $a
     * @param ComparatorableInterface $b
     * @return int
     */
    public function compare(ComparatorableInterface $a, ComparatorableInterface $b): int
    {
        return $a->getSum() <=> $b->getSum();
    }
}