<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'config.php'; // Connexion vers la base de données

$result = $conn->query("SELECT photos.*, users.username FROM photos JOIN users ON photos.user_id = users.id ORDER BY photos.created_at DESC");

echo '<form action="submit_vote.php" method="post">';
while($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
    echo "<p>Uploaded by: " . htmlspecialchars($row['username']) . " on " . $row['created_at'] . "</p>";
    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
    echo "<img src='" . htmlspecialchars($row['file_path']) . "' alt='" . htmlspecialchars($row['title']) . "'>";
    echo "<input type='checkbox' name='votes[]' value='" . $row['id'] . "'>";
    echo "</div>";
}
echo '<input type="submit" value="Validate">';
echo '</form>';
?>
