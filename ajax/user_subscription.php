<?php 
session_start();

require '../../kover1.0/php/modules/db_connect.php';
require '../../kover1.0/php/classes/User.php';
require '../../kover1.0/php/classes/UsersManager.php';
$vip = new User($db);
$controler = new UsersManager($db);
$vip->setUserName(htmlspecialchars(($_POST['userName'])));
if ($controler->doesUserNameAlreadyExist($vip->userName())){
    echo 'false';
    return false;
} else {
    $vip->setUserHashedPassword(hash("whirlpool", htmlspecialchars($_POST['userPassword'])));
    $vip->setUserCreationDate(date('Y-m-d H:i:s'));
    $vip->setUserStatus('user');
    $vip->setLangCode($_SESSION['langCode']);
    $adding=$controler -> addUser($vip);
    if (!$adding){
        echo 'false';
        return false;
    } else {
        $controler -> setUserSession($vip);
        $pageTitle = 'Kover - '. $vip->userName();
        echo 'true';
        return true;
    }
}        
include '../../kover1.0/php/modules/db_disconnect.php';

?>