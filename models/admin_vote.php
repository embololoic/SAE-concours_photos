<?php
session_start();
include 'config.php'; // Connexion à la base de données

$adminUserId = 1;

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $adminUserId) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $photoId = $_POST['photo_id'];

    // Prix du jury pour la photo sélectionnée
    $stmt = $conn->prepare("UPDATE photos SET admin_prize = TRUE WHERE id = ?");
    $stmt->bind_param("i", $photoId);

    if ($stmt->execute()) {
        echo "Le prix du jury a été attribué.";
