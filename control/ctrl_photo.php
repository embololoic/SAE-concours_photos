<?php


$legende = isset($_POST["legende"]) ? $_POST["legende"] : "Photo sans légende";

function list_photo(){
    // get connection
    require('./models/connection.php');
    $c = connection();
    // call CRUD
    require('./models/photo_model.php');
    $photos = fetch_photos($c);

    //view HTML
    require('./views/photo_view.php');

}

function upload_photo_controller() {
    require('./models/login_model.php');
    $error_message = "";
    $success_message = "";
    require('./models/connection.php');
    $connex = connection();
    require('./models/photo_model.php');
        $legende = $_POST["legende"];
        $user_id = $uid;

        $target_dir = "./uploads/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            insert_photo($connex, $target_file, $legende, $user_id);
            $success_message = "La photo a été uploadée avec succès.";
        } else {
            $error_message = "Désolé, il y a eu une erreur lors de l'upload de votre photo.";
        }


      require('./views/upload_view.php');

      if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] === "admin") {
          require('./views/admin_vote.php');
      }
}
