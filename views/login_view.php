<?php require('./views/blocks/header.php')?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Test LDAP</title>
</head>

<body>
    <div class="container">
        <h2>Authentification LDAP</h2>
        <form method="post" action="./index.php?route=login" enctype="multipart/form-data" class="login-form">
            <label for="login">Login :</label><input type="text" id="login" name="login" />
            <label for="pass">Mot de passe :</label><input type="password" id="pass" name="pass" />
            <input type="submit" value="Valider">
        </form>
        <p><?php echo $error_login;
        $error_login=0;
        ?></p>
    </div>

</body>
</html>

<?php require('./views/blocks/footer.php') ?>
