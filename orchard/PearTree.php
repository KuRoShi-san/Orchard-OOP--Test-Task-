<?php

require_once 'orchard/OrchardTree.php';

class PearTree extends OrchardTree
{

    function __construct() {
        $this->tree_type = 'pear';
        $this->registration_number = uniqid('pear_');
        $this->fruit_count = rand(0, 20);
    }

    protected function checkFruitWeight()
    {
        return rand(150, 180);
    }

}