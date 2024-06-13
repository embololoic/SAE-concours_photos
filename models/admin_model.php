<?php
class AdminModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function validateVotes() {
        // Mettre à jour tous les votes pour les marquer comme validés
        $query = $this->db->prepare("UPDATE vote SET validated = 1 WHERE validated = 0");
        $query->execute();
    }

    public function validatePhotos() {
        // Mettre à jour toutes les photos pour les marquer comme validées
        $query = $this->db->prepare("UPDATE photo SET validated = 1 WHERE validated = 0");
        $query->execute();
    }

    public function getResults() {
        // Compter le nombre de votes pour chaque photo et renvoyer les résultats dans l'ordre décroissant du nombre de votes
        $query = $this->db->prepare("SELECT photo_id, COUNT(*) as vote_count FROM vote WHERE validated = 1 GROUP BY photo_id ORDER BY vote_count DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUsersWhoVoted() {
    // Select all unique users who have voted
    $query = $this->db->prepare("SELECT DISTINCT user.id, user.nom, user.prenom FROM user INNER JOIN vote ON user.id = vote.user_id2");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}