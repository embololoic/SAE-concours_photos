<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'config.php';
include 'photo_model.php';

$photoModel = new PhotoModel($conn);
$photos = $photoModel->getPhotos();

include 'gallery.php';
