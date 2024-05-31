<?php

function upload_photo(){


    //database:
    require('./models/connection.php');
    $c = connection();
    //upload_photo();

    //view HTML
    require('views/upload_view.php');

}

function list_photo(){
    // get connection
    require('./models/connection.php');
    $c = connection();
    // call CRUD
    require('./models/photo_model.php');
    $photos = fetch_photos($c);

    //view HTML
    require('./views/photo_view.php');

}