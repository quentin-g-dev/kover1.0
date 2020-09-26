<?

function checkUserName($name){
    // Voir expressions régulières
    include 'db_connect.php';
    $testUser = new User($db);
    $testUserManager = new UsersManager($db);
    $result = $testUserManager->doesUserExist($testUser);
    if ($result === true){
        include 'db_disconnect.php';
        return false;
    }
    include 'db_disconnect.php';
    return true;
}

function checkUserPassword(){
    // voir expressions régulières
    return true;
}

function checkUserConnection($name, $hashedPassword){
    require './modules/db_connect.php';
    require_once './classes/User.php';
    require_once './classes/UsersManager.php';
    $currentUser = new User($db);
    $currentManager = new UsersManager($db);
    $currentUser -> setUserName($name);
    $currentUser -> setUserHashedPassword($hashedPassword);
    $result = $currentManager->isUserConnected($currentUser);
    require './modules/db_disconnect.php';
    return $result;
}

?>