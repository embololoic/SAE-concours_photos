<?php

function user_login()
{
        require('./models/login_model.php');
}

function check_login()
{
        session_start();
        if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
              header("Location: ./index.php");
              exit();
        }

}
