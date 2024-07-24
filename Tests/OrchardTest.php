<?php

use PHPUnit\Framework\TestCase;
use App\Orchard;

class OrchardTest extends TestCase {
    private $db;
    private $orchard;

    protected function setUp(): void {
        $this->db = new \App\Database('localhost', 'orchard_test', 'root', '');
        $this->db->query("TRUNCATE TABLE trees");
        
        $this->orchard = new Orchard($this->db);
    }

    public function testAddTree() {
        $this->orchard->addTree('Apple');
        $this->orchard->addTree('Pear');
        
        $treeCount = $this->db->query("SELECT COUNT(*) FROM trees")->fetchColumn();
        $this->assertEquals(2, $treeCount, 'There should be 2 trees in the database.');
    }

    // Остальные тесты
}

