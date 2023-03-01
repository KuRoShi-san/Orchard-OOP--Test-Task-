<?php

require_once 'orchard/OrchardTree.php';

class AppleTree extends OrchardTree
{

    function __construct() {
        $this->tree_type = 'apple';
        $this->registration_number = uniqid('apple_'); 
        $this->fruit_count = rand(40, 50);
    }

    protected function checkFruitWeight()
    {
        return rand(150, 180);
    }

}