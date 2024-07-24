<?php

require_once 'src/Database.php';
require_once 'src/Orchard.php';

// Создаем подключение к базе данных
$db = new Database('localhost', 'orchard', 'root', ''); // Замените параметры на ваши

// Создаем сад
$orchard = new Orchard($db);

// Добавляем деревья в сад
for ($i = 1; $i <= 10; $i++) {
    $orchard->addTree('Apple');
}

for ($i = 1; $i <= 15; $i++) {
    $orchard->addTree('Pear');
}

// Сбор фруктов
$orchard->harvestAll();

// Подсчет количества фруктов
$fruitCounts = $orchard->countFruits();
echo "Apples: " . $fruitCounts['Apple'] . "\n";
echo "Pears: " . $fruitCounts['Pear'] . "\n";

// Подсчет общего веса фруктов
$totalWeights = $orchard->totalWeight();
echo "Total weight of apples: " . $totalWeights['Apple'] . " grams\n";
echo "Total weight of pears: " . $totalWeights['Pear'] . " grams\n";

// Самое тяжелое яблоко
$heaviestApple = $orchard->heaviestApple();
echo "Heaviest apple weight: " . $heaviestApple['maxWeight'] . " grams\n";
echo "ID of the tree with the heaviest apple: " . $heaviestApple['tree_id'] . "\n";

?>
