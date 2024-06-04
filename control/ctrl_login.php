<?php

function user_login()
{
    require('./models/connection.php');
    $connex = connection();
    // call CRUD
    require('./models/login_model.php');
    $photos = login_ldap($connex);

}
