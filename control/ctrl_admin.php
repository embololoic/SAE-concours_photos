<?php
require('./models/connection.php');
require_once('./models/admin_model.php');
require_once('./views/admin_view.php'); // Include the AdminView class

class AdminController {
    private $model;
    private $view;

    public function __construct() {
        $db = connection(); // Créez l'objet de connexion à la base de données
        $this->model = new AdminModel($db); // Passez l'objet de connexion à la base de données à la classe AdminModel
        $this->view = new AdminView();
    }

    public function validateVotes() {
        $this->model->validateVotes();
        // Mettre à jour la vue en conséquence
    }

    public function validatePhotos() {
        $this->model->validatePhotos();
        // Mettre à jour la vue en conséquence
    }

    public function showResults() {
        $results = $this->model->getResults();
        $this->view->displayResults($results);
    }
}