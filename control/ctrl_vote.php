<?php

function fetch_votes() {
    // get connection
    require('./models/connection.php');
    $c = connection();
    // call CRUD
    require('./models/vote_model.php');
    $result = vote_dump($c);
    $votes_by_photo = $result['votes_by_photo'];
    $votes_total = $result['votes_total'];

    //view HTML
    require('./views/result_view.php');
}