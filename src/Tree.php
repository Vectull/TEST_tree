<?php

abstract class Tree {
    protected $id;
    protected $db;

    public function __construct($id, $db) {
        $this->id = $id;
        $this->db = $db;
    }

    abstract public function harvest();
}

?>
