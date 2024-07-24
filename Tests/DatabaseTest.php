<?php

use PHPUnit\Framework\TestCase;
use App\Database;

class DatabaseTest extends TestCase {
    private $db;

    protected function setUp(): void {
        $this->db = new Database('localhost', 'orchard_test', 'root', '');
    }

    public function testConnection() {
        $this->assertInstanceOf(Database::class, $this->db);
    }

    public function testClearTables() {
        // Убедитесь, что таблицы очищены правильно
        $this->db->clearTables();
        // Добавьте проверки для таблиц, например, убедитесь, что они пусты
    }
}
