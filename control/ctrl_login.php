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

function check_admin()
{
        session_start();
        if ($_SESSION['user_id'] == 1) {
              require('control/ctrl_vote.php');
              fetch_votes();
              exit();
        } else {
              header("Location: ./index.php?route=welcome");
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


    session_destroy();

    header("Location: ./index.php");
    exit();
}
