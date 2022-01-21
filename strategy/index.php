<?php

namespace Strategy;

use Strategy\Comparator\CreatedAtComparator;
use Strategy\Comparator\IdComparator;
use Strategy\Comparator\SumComparator;
use Strategy\Entity\Order;
use Strategy\Service\OrderSorter;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^Strategy/', '', $className);
    require_once __DIR__ . $className . '.php';
});

// Создаем заказы руками, в реальности мы будем эти заказы брать из БД.
$orders = [
    new Order(1, 500, new \DateTime('2010-01-01')),
    new Order(5, 1000, new \DateTime('2011-01-01')),
    new Order(4, 15.55, new \DateTime('2015-01-01')),
    new Order(3, 133, new \DateTime('2013-01-01')),
    new Order(2, 582, new \DateTime('2019-01-01')),
];

//
/**
 * Функция для вывода в консоль наших заказов (для удобства вывода).
 * @param Order[] $orders
 */
function renderOrders(array $orders)
{
    foreach ($orders as $order) {
        echo "id: {$order->getId()}\tsum: {$order->getSum()}" .
            "\tcreated at: {$order->getCreatedAt()->format('Y-m-d')}\n";
    }
}

// Создаем разные сортеры, которые будут использовать паттерн стратегии,
// внутрь мы передаем Comparator, который будет по определенным правилам
// сортировать наши заказы.
// Выбор компаратора может быть в коде в зависимости от каких-то условий,
// к примеру, в зависимости от того, какой сортировки захотел пользователь.
// То есть решать это можно во время выполнения.
$sorter = new OrderSorter(new IdComparator());

echo "--- Сортируем по id ---\n";
$idSortedArray = $sorter->sort($orders);
renderOrders($idSortedArray);

echo "--- Сортируем по sum ---\n";
$sumSortedArray = $sorter->setComparator(new SumComparator())->sort($orders);
renderOrders($sumSortedArray);

echo "--- Сортируем по createdAt ---\n";
$createdAtSortedArray = $sorter->setComparator(new CreatedAtComparator())->sort($orders);
renderOrders($createdAtSortedArray);
