<?php

require_once 'Tree.php';

class PearTree extends Tree {
    public function harvest() {
        $numPears = rand(0, 20);
        for ($i = 0; $i < $numPears; $i++) {
            $weight = rand(130, 170);
            $this->db->query("INSERT INTO fruits (tree_id, type, weight) VALUES (?, 'Pear', ?)", [$this->id, $weight]);
        }
    }
}

?>
