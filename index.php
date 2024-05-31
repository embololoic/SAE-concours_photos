<?php
// affichage des erreurs (periode de developpement)
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
ini_set('display_errors', 1);
    //The front root controller

    //The requested route
    $route = null;
    if (isset($_GET['route'])) {
        $route = $_GET['route'];
    }

    //We switch to the good controller
    switch ($route) {
        case null:
            require('views/welcome_view.php');
            break;

        case 'welcome':
            require('views/welcome_view.php');
            break;

        case 'upload':
            require('control/ctrl_photo.php');
            upload_photo();
            break;
        case 'photos';
            require('control/ctrl_photo.php');
            list_photo();
            break;
        case 'voter':
            require('control/ctrl_vote.php');
            break;

      # les controleurs :
        default:
            require('views/404_view.php');
            break;


    }
