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
        if (empty($_SESSION['user_id'])) {
              header("Location: ./index.php");
              exit();
        }

}

function unset_login()
{
      session_start();
      if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {

            header("Location: ./index.php");
            exit();
      } else {
            unset($_SESSION['user_id']);
            session_destroy();
            header("Location: ./index.php");
            exit();
      }

}

function user_logout() {
    session_start();

    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();

    header("Location: ./index.php");
    exit();
}
