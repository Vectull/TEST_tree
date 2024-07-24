<?php

 class Database {
    private $pdo;

    public function __construct($host, $dbname, $user, $pass) {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        try {
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }

    public function deleteFromTable($tableName) {
        $this->query("DELETE FROM $tableName");
    }

    public function clearTables() {
        // Очистка таблиц
        $this->deleteFromTable('fruits');
        $this->deleteFromTable('trees');
    }

    public function getPdo() {
        return $this->pdo;
    }
}

?>
