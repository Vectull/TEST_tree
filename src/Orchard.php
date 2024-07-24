<?php

require_once 'Tree.php';
require_once 'AppleTree.php';
require_once 'PearTree.php';

class Orchard {
    private $db;
    private $trees = [];

    public function __construct($db) {
        $this->db = $db;
    }

    public function addTree($type) {
        $this->db->query("INSERT INTO trees (type) VALUES (?)", [$type]);
        $treeId = $this->db->lastInsertId();

        if ($type == 'Apple') {
            $this->trees[] = new AppleTree($treeId, $this->db);
        } elseif ($type == 'Pear') {
            $this->trees[] = new PearTree($treeId, $this->db);
        }
    }

    public function harvestAll() {
        foreach ($this->trees as $tree) {
            $tree->harvest();
        }
    }

    public function countFruits() {
        $result = $this->db->query("SELECT type, COUNT(*) as count FROM fruits GROUP BY type")->fetchAll(PDO::FETCH_ASSOC);
        $counts = ['Apple' => 0, 'Pear' => 0];
        foreach ($result as $row) {
            $counts[$row['type']] = $row['count'];
        }
        return $counts;
    }

    public function totalWeight() {
        $result = $this->db->query("SELECT type, SUM(weight) as totalWeight FROM fruits GROUP BY type")->fetchAll(PDO::FETCH_ASSOC);
        $weights = ['Apple' => 0, 'Pear' => 0];
        foreach ($result as $row) {
            $weights[$row['type']] = $row['totalWeight'];
        }
        return $weights;
    }

    public function heaviestApple() {
        $result = $this->db->query("SELECT tree_id, MAX(weight) as maxWeight FROM fruits WHERE type = 'Apple'")->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getTrees() {
        return $this->trees;
    }
}

?>
