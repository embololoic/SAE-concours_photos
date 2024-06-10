<?php
// affichage des erreurs (periode de developpement)
    //The front root controller

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

      # les controleurs :
        default:
            require('views/404_view.php');
            break;
    }
