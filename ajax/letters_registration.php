<?php
session_start();

if (isset ($_SESSION['vip'])){
    require '../../kover1.0/php/classes/User.php';
    require '../../kover1.0/php/classes/UsersManager.php';
    require '../../kover1.0/php/modules/db_connect.php';
    $vip = new User($db);
    $vipManager = new UsersManager($db);
    $vipManager->setUserFromSession($vip, $_SESSION['vip']);
}


if(isset($_POST["proj"])){
    $projName = htmlspecialchars($_POST["proj"]);
    if (isset ($_SESSION['vip'])){
        if ($vipManager->checkUserConnection($vip)){
            if($vipManager->doesProjectExist($vip, $projName)){
                echo 'true';
            } else {
                echo 'false';
            }
        }
    }
}

if (isset($_POST["versionTitle"]) && isset($_POST["version"])&& isset($_POST["projName"])) {
    $title = htmlspecialchars($_POST["versionTitle"]);
    $letter=htmlspecialchars($_POST["version"]);
    $projName=htmlspecialchars($_POST["projName"]);
    if (isset ($_SESSION['vip'])){
        if ($vipManager->checkUserConnection($vip)){
            if(!$vipManager->doesLetterExist($vip, $title,$projName)){
                $vipManager-> addLetter($vip, $projName, $title, $letter);
                echo 'ok';
            } else {
                if (isset ($_POST['forced'])){
                    $vipManager-> addLetter($vip, $projName, $title, $letter);
                    echo 'ok';
                }else {            
                    echo 'changeLetterName';
                }
            }
        } else{                      
            echo 'unconnected';
        }
    }
}

if(isset($_POST['isUserConnected'])){
    if ($vipManager->checkUserConnection($vip)){
        echo 'yes';
    }else{
        echo 'no';
    }
}

require '../../kover1.0/php/modules/db_disconnect.php';
?>