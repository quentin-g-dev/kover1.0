<?php
    session_start();

    $projName = $_POST["projName"];
    if (isset ($_SESSION['vip'])){
    
        include '../../kover1.0/php/classes/User.php';
        include '../../kover1.0/php/classes/UsersManager.php';
        require '../../kover1.0/php/modules/db_connect.php';
        $vip = new User();
        $vipManager = new UsersManager($db);
        $vipManager->setUserFromSession($vip, $_SESSION['vip']);
        if ($vipManager->checkUserConnection($vip)){
            $result=$vipManager-> deleteProject($vip, $projName);
            echo $vip->userId();
        } else{                      
            echo 'not ok';
        }
        require '../../kover1.0/php/modules/db_disconnect.php';
    }
       
?>