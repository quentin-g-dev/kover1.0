<?php
    session_start();

 ///////////////////////////////////////////////////////////////////////// getLangCode
 if(isset($_GET['whichlang'])){
   if(isset($_SESSION['vip']['langCode'])){
      $code = $_SESSION['vip']['langCode'];
      echo $code;
   } else {
      if(isset ($_SESSION['langCode'])){
         $code = $_SESSION['langCode'];
         echo $code;
      } else {   
         $code='FR';
         echo $code;}

   }
    
}

//////////////////////////////////////////////////////////////////////// setLangCode

if(isset($_POST['lang'])){
   $lang=$_POST['lang'];
   $_SESSION['langCode'] = $lang;
   if (isset($_SESSION['vip'])){
      $_SESSION['vip']['langCode'] = $lang;
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
   }
   $code = $_SESSION['langCode'];
   echo $code;
}
   
?>