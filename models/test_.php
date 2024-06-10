<?php
require ('./models/connection.php');

if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['fileToUpload']['tmp_name'];
    $fileName = $_FILES['fileToUpload']['name'];
    $fileType = $_FILES['fileToUpload']['type'];
    $fileSize = $_FILES['fileToUpload']['size'];

// Lire le contenu du fichier
    $fileContent = file_get_contents($fileTmpPath);

// Préparer la requête SQL
    $stmt = $conn->prepare("INSERT INTO files (name, type, size, content) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssbs", $fileName, $fileType, $fileSize, $fileContent);

// Exécuter la requête
    if ($stmt->execute()) {
        echo "Le fichier a été téléchargé et enregistré dans la base de données avec succès.";
    } else {
        echo "Erreur : " . $stmt->error;
    }

// Fermer la requête préparée
    $stmt->close();
} else {
    echo "Aucun fichier n'a été téléchargé ou il y a eu une erreur de téléchargement.";
}

// Fermer la connexion
$conn->close();
?>

