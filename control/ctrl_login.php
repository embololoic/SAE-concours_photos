<?php

function user_login()
{
    require('./models/connection.php');
    $connex = connection();
    // call CRUD
    require('./models/login_model.php');
    $photos = login_ldap($connex);

}

function check_login()
{
        session_start();
        if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
              header("Location: ./index.php");
              exit();
        }

}
