<?php
// affichage des erreurs (periode de developpement)
    //The front root controller
    error_reporting(E_ERROR);
    ini_set("display_errors", 1);

    //The requested route
    $route = null;
    if (isset($_GET['route'])) {
        $route = $_GET['route'];
    }

    //We switch to the good controller
    switch ($route) {
        case null:
            require('views/login_view.php');
            break;

        case 'welcome':
            require('control/ctrl_login.php');
            check_login();
            require('views/welcome_view.php');
            break;

        case 'upload':
            require('control/ctrl_login.php');
            check_login();
            require('control/ctrl_photo.php');
            upload_photo_controller();
            break;

        case 'photos';
            require('control/ctrl_login.php');
            check_login();
            require('control/ctrl_photo.php');
            list_photo();
            break;

        case 'voter':
            require('control/ctrl_login.php');
            check_login();
            require('control/ctrl_photo.php');
            list_photo();
            require('control/ctrl_vote.php');
            vote_add_controller();
            break;

        case 'resultats':
            require('control/ctrl_login.php');
            check_login();
            require('control/ctrl_vote.php');
            fetch_votes();
            break;

        case 'login':
            require('control/ctrl_login.php');
            user_login();
            break;

        case 'logout':
            require('control/ctrl_login.php');
            user_logout();
            break;

        case 'admin':
        require('control/ctrl_login.php');
        check_login(); // Assurez-vous que l'utilisateur est connecté et a les droits d'administration
        require('control/ctrl_admin.php');
        $adminController = new AdminController();
        $action = null;
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }
        switch ($action) {
            case 'validateVotes':
                $adminController->validateVotes();
                break;
            case 'validatePhotos':
                $adminController->validatePhotos();
                break;
            case 'showResults':
                $adminController->showResults();
                break;
            default:
                echo "Action d'administration non reconnue.";
                break;
        }
    break;

      # les controleurs :
        default:
            require('views/404_view.php');
            break;
    }
