<?php
    session_start();

    $projName = $_POST["projName"];
    $title = $_POST['versionTitle'];
    $letter=$_POST['version'];
    if (isset ($_SESSION['vip'])){
    
        include '../../kover1.0/php/modules/db_connect.php';
        include '../../kover1.0/php/classes/User.php';
        include '../../kover1.0/php/classes/UsersManager.php';
        $vip = new User($db);
        $vipManager = new UsersManager($db);
        $vipManager->setUserFromSession($vip, $_SESSION['vip']);
        if ($vipManager->checkUserConnection($vip)){
        
            
            //$vipManager-> addLetter($vip, $projName, $versionTitle, $version);
            echo 'ok';
            return true;
        } else{
            $_SESSION['draftProjName']=[];
            $_SESSION['draftVersionTitle']=[];
            $_SESSION['draftVersion']=[];
            array_push($_SESSION['draftProjName'], $projName);
            array_push($_SESSION['draftVersionTitle'],$title);
            array_push($_SESSION['draftVersion'], $letter);
            echo 'draft in stock';
            return false;
        }
    } else {
        $_SESSION['draftProjName']=[];
            $_SESSION['draftVersionTitle']=[];
            $_SESSION['draftVersion']=[];
        array_push($_SESSION['draftProjName'], $projName);
        array_push($_SESSION['draftVersionTitle'],$title);
        array_push($_SESSION['draftVersion'], $letter);
        echo 'draft in stock';
        return false;
    }
       
?>