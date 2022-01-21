<?php

declare(strict_types=1);

namespace Strategy\Service;

use Strategy\Contract\ComparatorInterface;
use Strategy\Entity\Order;

class OrderSorter
{
    /**
     * @var ComparatorInterface
     */
    private $comparator;

    /**
     * OrderSorter constructor.
     * @param ComparatorInterface $comparator
     */
    public function __construct(ComparatorInterface $comparator)
    {
        $this->comparator = $comparator;
    }

    /**
     * @param Order[] $orders
     * @return Order[]
     */
    public function sort(array $orders): array
    {
        usort($orders, [$this->comparator, 'compare']);

        return $orders;
    }


    public function setComparator(ComparatorInterface $comparator): self
    {
        $this->comparator = $comparator;
        return $this;
    }
}