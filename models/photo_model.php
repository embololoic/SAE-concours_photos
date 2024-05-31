<?php
/**
 * fetch photos
 * return id, legende, user_id1, filepath
 * @param PDO $connex
 * @return array
 */
function fetch_photos(PDO $connex) {

    $req = "SELECT id, legende, user_id1, file_path FROM photo";

    $prep = $connex->prepare($req);
    $prep->execute();
    $photos = $prep->fetchAll(PDO::FETCH_ASSOC);
    $prep->closeCursor();

    return $photos;
}