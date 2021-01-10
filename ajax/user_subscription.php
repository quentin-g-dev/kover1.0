<?php 
session_start();

include_once ('../php/modules/db_connect.php');
require '../php/classes/User.php';
require '../php/classes/UsersManager.php';
$candidate = new User();
$controller = new UsersManager($db);
$candidate->setUserName($_POST['userName']);
if ($controller->doesUserNameAlreadyExist($candidate->userName())){
    echo 'false';
    return false;
} else {
    $candidate->setUserHashedPassword(hash("whirlpool", htmlspecialchars($_POST['userPassword'])));
    $candidate->setUserCreationDate(date('Y-m-d H:i:s'));
    $candidate->setUserStatus('user');
    $candidate->setLangCode($_SESSION['langCode']);
    if (!$controller -> addUser($candidate)){
        echo 'false';
        require '../php/modules/db_disconnect.php';

        return false;
    } else {
        $controller -> setUserSession($candidate);
        $pageTitle = 'Kover - '. $candidate->userName();
        echo 'true';
        require '../php/modules/db_disconnect.php';

        return true;
    }
}   