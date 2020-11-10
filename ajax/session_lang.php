<?php
    session_start();

 ///////////////////////////////////////////////////////////////////////// getLangCode
 if(isset($_GET['whichlang'])){
     if (isset($_SESSION['vip'])){
        $code = $_SESSION['vip']["langCode"];
        $_SESSION["langCode"] = $_SESSION['vip']["langCode"];

        echo $code;
        return ($code);
     }else {
        $code = $_SESSION['langCode'];
        echo $code;
        return $code;
     }
}

//////////////////////////////////////////////////////////////////////// setLangCode

if(isset($_GET['lang'])){
    $_SESSION['langCode'] = $_GET['lang'];
    if (isset($_SESSION['vip'])){
        $_SESSION['vip']['langCode'] = $_GET['lang'];
        //Connexion à la BDD
        include '../php/modules/db_connect.php';

        // Import des classes User et UsersManager
        include '../php/classes/User.php';
        include '../php/classes/UsersManager.php';

        // Instanciation et configuration d'une paire user / manager
        $vip = new User($db);
        $vipManager = new UsersManager($db);

        $vipManager->setUserFromSession($vip, $_SESSION['vip']);
        $vipManager->updateUser($vip);
        // Déconnexion de la BDD
        include '../php/modules/db_disconnect.php';
    
    } else {
        echo 'no';
    }
    echo $_SESSION['langCode'];
    return $_SESSION['langCode'];
}
   
?>