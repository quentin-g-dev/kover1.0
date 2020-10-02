<?

function setUserSession($name, $password){
    require './modules/db_connect.php';
    $user = new User ($db);
    $user ->hydrateUser("test", htmlspecialchars($name), hash("whirlpool",htmlspecialchars($password)), "test", "test");

    $userTable["id"] = $user->userId(); 
    $userTable["name"] = $user->userName(); 
    $userTable["hashedPassword"] = $user->userHashedPassword(); 
    $userTable["status"] = $user->userStatus(); 
    $userTable["creationDate"] = $user->userCreationDate(); 
    
    $_SESSION['user'] = $userTable;
    require './modules/db_disconnect.php';
}

?>