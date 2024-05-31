<?php

function upload_photo(){


    //database:
    require('./models/connection.php');
    $c = connection();
    require('./models/model_photo.php');
    //upload_photo();

    //view HTML
    require('views/upload_view.php');

}

function list_photo(){
    require('./models/connection.php');
    $c = connection();
    require('./models/model_photo.php');
    //upload_photo();

    //view HTML
    require('./views/photo_view.php');

}