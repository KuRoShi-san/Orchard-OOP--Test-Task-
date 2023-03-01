<?php
declare(strict_types = 1);

require_once 'orchard/AppleTree.php';
require_once 'orchard/PearTree.php';

class OrchardService
{

    public static function plantTrees(array $trees_to_plant): array
    {
        $orchid_content = [];

        foreach($trees_to_plant as $tree_type) {
            switch ($tree_type['tree']) {
                case 'apple':
                    for($i = 0; $i < $tree_type['count']; $i++) {
                        $orchid_content[] = new AppleTree();
                    }
                    break;
                case 'pear':
                    for($i = 0; $i < $tree_type['count']; $i++) {
                        $orchid_content[] = new PearTree();
                    }
                    break;
            }
        }

        return $orchid_content;
        
    }

    public static function collectFruits(array $orchid_content): array
    {

        $orchid_harvest = [];

        foreach($orchid_content as $tree_content) {
            switch ($tree_content->tree_type) {
                case 'apple':
                    $orchid_harvest['apple_harvest'][] = $tree_content->produceFruits();
                    break;
                case 'pear':
                    $orchid_harvest['pear_harvest'][] = $tree_content->produceFruits();
                    break;
            }
        }

        return $orchid_harvest;

    }

    public static function countHarvest(array $orchid_harvest): array
    {

        $orchid_harvest_count_by_type = ['total_apple_harvest' => 0, 'total_pear_harvest' => 0];

        foreach($orchid_harvest['apple_harvest'] as $apple_tree_content) {
            $orchid_harvest_count_by_type['total_apple_harvest'] += count($apple_tree_content['apple_weight']);
        }

        
        foreach($orchid_harvest['pear_harvest'] as $pear_tree_content) {
            if(!isset($pear_tree_content["no_fruits"])) {
                $orchid_harvest_count_by_type['total_pear_harvest'] += count($pear_tree_content['pear_weight']);
            } 
        }

        return $orchid_harvest_count_by_type;

    }

    public static function countHarvestWeight(array $orchid_harvest): array
    {

        $orchid_harvest_weight_by_type = ['total_apple_weight' => 0, 'total_pear_weight' => 0];

        foreach($orchid_harvest['apple_harvest'] as $apple_tree_content) {
            $orchid_harvest_weight_by_type['total_apple_weight'] += array_sum($apple_tree_content['apple_weight']);
        }

        foreach($orchid_harvest['pear_harvest'] as $pear_tree_content) {
            if(!isset($pear_tree_content["no_fruits"])) {
                $orchid_harvest_weight_by_type['total_pear_weight'] += array_sum($pear_tree_content['pear_weight']);
            } 
        }

        return $orchid_harvest_weight_by_type;

    }

}