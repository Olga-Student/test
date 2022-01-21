<?php

namespace TemplateMethod;

use TemplateMethod\Networks\FacebookPost;
use TemplateMethod\Networks\VkPost;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^TemplateMethod/', '', $className);
    require_once __DIR__ . $className . '.php';
});

// Классы Vk и Facebook содержат только реализации методов, которые необходимы
// для работы со своими соц. сетями, логика работы с соц. сетями прописана у
// родительского абстрактного класса.
$vk = new VkPost('Pavel', '123123');
$vk->post('Привет!');
echo "----------------\n";
$facebook = new FacebookPost('Pavel', '123123');
$facebook->post('Привет!');