<?php require('./views/blocks/header.php')?>
<div id="bandeau">
    <h2 class="titre">IUT CHATELLERAULT</h2>
</div>
<h2>Se connecter</h2>

<h2>Se connecter pour continuer</h2>

<?php
//error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
//ini_set('display_errors', 1);

// Vérifie si le compte existe dans le LDAP de l'Université
//Attention, on a besoin d'installer le paquet php-ldap pour que cela fonctionne !

// Configuration pour l'interface PHP du LDAP
define('SERVER', 'ldaps://ldapsupannappli.univ-poitiers.fr:636');
define('ROOT', 'ou=people,dc=univ-poitiers,dc=fr');

// recuperation données formulaire. Attention il faut ajouter des contrôles !
$login=$_POST['login'];
$pass=$_POST['pass'];

// Initialisation de la connexion LDAP
$connex=ldap_connect(SERVER);
ldap_set_option($connex, LDAP_OPT_PROTOCOL_VERSION, 3);

if ($connex) {
	// on se connecte anonymement dans un premier temps afin de trouver l'uid correspondant au login
    ldap_bind($connex);
    //on recherche l'uid correspondant au login'
    $req = 'supannAliasLogin=' . $login;
    $res = ldap_search($connex, ROOT, $req);
	$entries = ldap_get_entries($connex, $res);
    if ($entries) {
        $uid = $entries[0]['uid'][0];
        // on se connecte maintenant avec l'uid récupéré de l'utilisateur et on vérifie si la requête aboutit
    $dn = 'uid=' . $uid . ',' . ROOT;
	if (ldap_bind($connex,$dn,$pass)) {
        echo "<p>COMPTE EXISTANT</p>";
        } else {
            echo "<p>PAS DE COMPTE</p>";
        }
    }
    
    //Fermeture de la connexion LDAP
	ldap_close($connex);
	
}
else {
	echo "Impossible de se connecter au serveur LDAP\n";
}

?>

    <form method="post" action="recherche_ldap_univ.php" enctype="multipart/form-data">
        <label for="login">Login :</label><input type="text" id="login" name="login" />
        <label for="pass">Mot de passe :</label><input type="password" id="pass" name="pass" />
        <input type="submit" value="Valider">
    </form>

<p>"Seuls les étudiants de l'IUT peuvent participer. La communauté étudiante décide !"</p>

<?php 

require('./views/blocks/footer.php');
