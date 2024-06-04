
<?php
session_start();

// Configuration for the LDAP server
define('SERVER', 'ldaps://ldapsupannappli.univ-poitiers.fr:636');
define('ROOT', 'ou=people,dc=univ-poitiers,dc=fr');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $connex = ldap_connect(SERVER);
    ldap_set_option($connex, LDAP_OPT_PROTOCOL_VERSION, 3);

    if ($connex) {
        ldap_bind($connex);
        $req = 'supannAliasLogin=' . $login;
        $res = ldap_search($connex, ROOT, $req);
        $entries = ldap_get_entries($connex, $res);

        if ($entries['count'] > 0) {
            $uid = $entries[0]['uid'][0];
            $dn = 'uid=' . $uid . ',' . ROOT;

            if (ldap_bind($connex, $dn, $pass)) {
                $_SESSION['user_id'] = $uid;
                header('Location: vote.php');
                exit();
            } else {
                require('./views/login_view.php');
                echo "<p>Mot de passe incorrect.</p>";
            }
        } else {
            require('./views/login_view.php');
            echo "<p>Utilisateur n'existe pas</p>";
        }
        ldap_close($connex);
    } else {
        echo "Unable to connect to LDAP server.";
    }
}
?>
