<?php
require('./models/connection.php');
require_once('./models/admin_model.php');
require_once('./views/admin_view.php'); // Include the AdminView class

class AdminController {
    private $model;
    private $view;

    public function __construct() {
        $db = connection(); // Create the database connection object
        $this->model = new AdminModel($db); // Pass the database connection object to the AdminModel class
        $this->view = new AdminView();
        $usersWhoVoted = $this->model->getUsersWhoVoted();
        $this->view->displayUsersWhoVoted($usersWhoVoted);
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