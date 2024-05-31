<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'config.php'; // Connexion vers la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user_id'];
    $votes = $_POST['votes'];

    if (!isset($votes) || count($votes) !== 3) {
        echo "<p>Selectionnez 3 photos. Vous avez selectionné " . count($votes) . " photo(s).</p>";
        echo '<a href="vote.php">Retour</a>';
        exit();
    }

    $conn->begin_transaction();
    try {
        // Supprimer tous les votes existants de cet utilisateur
        $stmt = $conn->prepare("DELETE FROM votes WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        // Insérer de nouveaux votes
        $stmt = $conn->prepare("INSERT INTO votes (user_id, photo_id) VALUES (?, ?)");
        foreach ($votes as $photoId) {
            $stmt->bind_param("ii", $userId, $photoId);
            $stmt->execute();
        }

        $conn->commit();
        echo "Votre vote est validé.";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Une erreur s'est produite. Veuillez réessayer.";
    }
}
?>
