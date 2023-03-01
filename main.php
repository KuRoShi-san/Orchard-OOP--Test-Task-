<?php

require_once 'service/OrchardService.php';

$trees_to_plant = [
        'type_1' => ['tree' => 'apple', 'count' => 10],
        'type_2' => ['tree' => 'pear', 'count' => 15]
]; // Определения кол-ва и типов высаживаемых деревьев

$orchid_content = OrchardService::plantTrees($trees_to_plant); // Высадка фруктовых деревьев

$orchid_harvest = OrchardService::collectFruits($orchid_content); // Сбор фруктов

$orchid_harvest_count = OrchardService::countHarvest($orchid_harvest); // Подсчет фруктов

$orchid_harvest_weight = OrchardService::countHarvestWeight($orchid_harvest); // Взвешивание фруктов

echo "Урожай:\n
Яблоки:\nКол-во: $orchid_harvest_count[total_apple_harvest] шт., Вес: $orchid_harvest_weight[total_apple_weight] грамм\n
Груши:\nКол-во: $orchid_harvest_count[total_pear_harvest] шт., Вес: $orchid_harvest_weight[total_pear_weight] грамм \n";
// Вывод информации о урожае