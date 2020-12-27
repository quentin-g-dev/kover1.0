<?php

if (isset($_SESSION['vip'])){

    //Connexion à la BDD
    require_once './php/modules/db_connect.php';

    // Import des classes User et UsersManager
    include './php/classes/User.php';
    include './php/classes/UsersManager.php';

    // Instanciation et configuration d'une paire user / manager
    $vip = new User($db);
    $vipManager = new UsersManager($db);

    $vipManager->setUserFromSession($vip, $_SESSION['vip']);
    if (!$vipManager->checkUserConnection($vip)){
        echo 'Problème d\'identification !<br>Cliquez <a href="./index.php?disc=1">ici pour vous connecter de nouveau.';
    }
 


    // Déconnexion de la BDD
    require_once './php/modules/db_disconnect.php';
}

?>