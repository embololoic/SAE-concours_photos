<?php
/**
 * fetch votes
 * return id, photo_id, user_id
 * @param PDO $connex
 * @return array
 */
function vote_dump(PDO $connex) {
    $req = "SELECT p.id, p.file_path, COUNT(v.id) AS total_votes
            FROM photo p
            INNER JOIN vote v ON p.id = v.photo_id
            GROUP BY p.id, p.file_path";

    $prep = $connex->prepare($req);
    $prep->execute();
    $votes_by_photo = $prep->fetchAll(PDO::FETCH_ASSOC);
    $prep->closeCursor();

    // Get the sum of all votes
    $req_sum = "SELECT COUNT(*) AS votes_total FROM vote";
    $prep_sum = $connex->prepare($req_sum);
    $prep_sum->execute();
    $votes_total = $prep_sum->fetchColumn();
    $prep_sum->closeCursor();

    return array(
        'votes_by_photo' => $votes_by_photo,
        'votes_total' => $votes_total
    );
}