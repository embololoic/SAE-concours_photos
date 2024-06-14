<?php
class AdminModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    function validateVotes() {
        $query = $this->db->prepare("UPDATE vote SET validated = 1 WHERE validated = 0");
        $query->execute();
    }

    function validatePhotos() {
        $query = $this->db->prepare("UPDATE photo SET validated = 1 WHERE validated = 0");
        $query->execute();
    }


}