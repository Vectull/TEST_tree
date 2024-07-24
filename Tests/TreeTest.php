<?php

use PHPUnit\Framework\TestCase;
use App\AppleTree;
use App\PearTree;

class TreeTest extends TestCase {
    private $db;

    protected function setUp(): void {
        $this->db = new \App\Database('localhost', 'orchard_test', 'root', '');
        $this->db->query("TRUNCATE TABLE fruits");
        $this->db->query("TRUNCATE TABLE trees");
    }

    public function testAppleTreeHarvest() {
        $tree = new AppleTree(1, $this->db);
        $tree->harvest();

        $appleCount = $this->db->query("SELECT COUNT(*) FROM fruits WHERE type = 'Apple'")->fetchColumn();
        $this->assertGreaterThan(0, $appleCount, 'There should be some apples in the database.');
    }

    public function testPearTreeHarvest() {
        $tree = new PearTree(1, $this->db);
        $tree->harvest();

        $pearCount = $this->db->query("SELECT COUNT(*) FROM fruits WHERE type = 'Pear'")->fetchColumn();
        $this->assertGreaterThan(0, $pearCount, 'There should be some pears in the database.');
    }

   
}

