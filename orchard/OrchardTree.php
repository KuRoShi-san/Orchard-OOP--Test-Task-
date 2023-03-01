<?php

abstract class OrchardTree
{

    public $tree_type;
    public $registration_number;
    protected $fruit_count;

    abstract protected function checkFruitWeight();

    public function produceFruits(): array
    {

        $fruits_on_tree = [];

        for($i = 0; $i < $this->fruit_count; $i++) {
            $fruits_on_tree[$this->tree_type . '_weight'][] = $this->checkFruitWeight();
        }
        if($this->fruit_count === 0) {
            $fruits_on_tree = ['no_fruits' => $this->tree_type];
        }

        $this->fruit_count = 0; // Фрукты собраны с дерева

        return $fruits_on_tree;

    }

}