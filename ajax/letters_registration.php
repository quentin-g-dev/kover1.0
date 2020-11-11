<?php
session_start();
if(isset($_POST["projName"])&& isset($_POST["versionTitle"])&&isset($_POST["version"])){
    $projName = $_POST["projName"];
    $title = $_POST["versionTitle"];
    $letter=$_POST["version"];
    if (isset ($_SESSION['vip'])){
    
        include '../../kover1.0/php/classes/User.php';
        include '../../kover1.0/php/classes/UsersManager.php';
        require '../../kover1.0/php/modules/db_connect.php';
        $vip = new User($db);
        $vipManager = new UsersManager($db);

        $vipManager->setUserFromSession($vip, $_SESSION['vip']);
        if ($vipManager->checkUserConnection($vip)){
            $vipManager-> addLetter($vip, $projName, $title, $letter);
            echo 'ok';
        } else{                      
            echo 'not ok';
        }
        require '../../kover1.0/php/modules/db_disconnect.php';
    }
}
if(isset($_POST['isUserConnected'])){
    include '../../kover1.0/php/classes/User.php';
    include '../../kover1.0/php/classes/UsersManager.php';
    require '../../kover1.0/php/modules/db_connect.php';
    $vip = new User($db);
    $vipManager = new UsersManager($db);
    if ($vipManager->checkUserConnection($vip)){
        echo 'yes';
    }else{
        echo 'no';
    }
}
       
?>