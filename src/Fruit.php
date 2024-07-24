<?php

class Fruit {
    protected $weight;

    public function __construct($weight) {
        $this->weight = $weight;
    }

    public function getWeight() {
        return $this->weight;
    }
}

class Apple extends Fruit {}

class Pear extends Fruit {}

?>
