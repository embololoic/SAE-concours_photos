<?php
class PhotoModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getPhotos() {
        //$query = "SELECT photos.*, users.username FROM photos JOIN users ON photos.user_id = users.id ORDER BY photos.created_at DESC";
        $query = "SELECT * FROM photos";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
