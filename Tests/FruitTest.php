<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Fruit.php';

class FruitTest extends TestCase {
    public function testAppleWeight() {
        $apple = new Apple(150);
        $this->assertEquals(150, $apple->getWeight());
    }

    public function testPearWeight() {
        $pear = new Pear(130);
        $this->assertEquals(130, $pear->getWeight());
    }
}

?>
