<?php

require_once 'Tree.php';

class AppleTree extends Tree {
    public function harvest() {
        $numApples = rand(40, 50);
        for ($i = 0; $i < $numApples; $i++) {
            $weight = rand(150, 180);
            $this->db->query("INSERT INTO fruits (tree_id, type, weight) VALUES (?, 'Apple', ?)", [$this->id, $weight]);
        }
    }
}

?>
