<?php 
session_start();
include_once ('../php/modules/db_connect.php');
require '../php/classes/User.php';
require '../php/classes/UsersManager.php';
$vip = new User();
$controler = new UsersManager($db);
$vip->setUserName(htmlspecialchars(($_POST['userName'])));
$vip->setUserHashedPassword(hash('whirlpool',htmlspecialchars($_POST['userPassword'])));
$controler->checkUserConnection($vip);

if ($controler->checkUserConnection($vip)){
    $controler->hydrateUser($vip);
    $controler->setUserSession($vip);
    $controler->setUserFromSession($vip, $_SESSION['vip']);
    echo 'true';
    return true;

} else {

    echo 'false';
    return false;
}

require '../../kover1.0/php/modules/db_disconnect.php';

?>