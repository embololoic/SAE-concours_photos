<?php
class AdminView {
    public function displayResults($results) {
        echo "<h1>Résultats des votes</h1>";
        echo "<table>";
        echo "<tr><th>Photo ID</th><th>Nombre de votes</th></tr>";
        foreach ($results as $result) {
            echo "<tr><td>" . $result['photo_id'] . "</td><td>" . $result['vote_count'] . "</td></tr>";
        }
        echo "</table>";
    }

    public function displayValidationInterface() {
        echo "<h1>Interface de validation</h1>";
        echo "<form method='post' action='ctrl_admin.php'>";
        echo "<input type='submit' name='validate_votes' value='Valider les votes'>";
        echo "<input type='submit' name='validate_photos' value='Valider les photos'>";
        echo "</form>";

    }
    public function displayUsersWhoVoted($users) {
    echo "<h1>Utilisateurs qui ont voté</h1>";
    echo "<ul>";
    foreach ($users as $user) {
        echo "<li>" . htmlspecialchars($user['nom']) . " " . htmlspecialchars($user['prenom']) . "</li>";
    }
    echo "</ul>";
}
}

