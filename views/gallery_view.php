<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<form action="./submit_vote.php" method="post">
    <?php foreach ($photos as $photo): ?>
        <div>
            <h2><?= htmlspecialchars($photo['title']) ?></h2>
            <p>Uploaded by: <?= htmlspecialchars($photo['username']) ?> on <?= $photo['created_at'] ?></p>
            <p><?= htmlspecialchars($photo['description']) ?></p>
            <img src="<?= htmlspecialchars($photo['file_path']) ?>" alt="<?= htmlspecialchars($photo['title']) ?>">
            <input type="checkbox" name="votes[]" value="<?= $photo['id'] ?>">
        </div>
    <?php endforeach; ?>
    <input type="submit" value="Validate">
</form>
