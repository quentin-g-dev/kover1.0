<?

require './class/User.php';
require './class/UsersManager.php';

function checkUserName($name){
    // Voir expressions régulières
    include 'db_connect.php';
    $testUser = new User($db);
    $testUserManager = new UsersManager($db);
    $result = $testUserManager->doesUserExist($testUser);
    if ($result === true){
        return false;
    }
}

function checkPassword(){
    // voir expressions régulières
}

?>