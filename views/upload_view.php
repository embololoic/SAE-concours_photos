<?php require('./views/blocks/header.php')?>

<body>
<div class="upload-form">
    <h1>Uploader une photo</h1>
    <form action="./index.php?=upload" method="post" enctype="multipart/form-data">
        <label for="photo">Sélectionner votre photo :</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>
        <br><br>
        <label for="titre">Légende* :</label>
        <input type="text" id="legende" name="legende" required>
        <br><br>
        <input type="submit" value="Participer!">
    </form>
</div>
</body>

<?php

require('./views/blocks/footer.php');