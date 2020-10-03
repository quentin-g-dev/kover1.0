<?php

class UsersManager {

    //Attributes
    private $_db;

    //Constructor
    public function __construct($db){
        $this-> _db = $db;
    }

    //Méthodes de gestion des utilisateurs
    public function addUser (User $user){
        $query = $this -> _db -> prepare('INSERT INTO users (userName, userHashedPassword, userStatus, userCreationDate) VALUES (:userName, :userHashedPassword, :userStatus, :userCreationDate)');
        $query -> bindValue(':userName', $user-> userName());
        $query -> bindValue(':userHashedPassword', $user-> userHashedPassword());
        $query -> bindValue(':userStatus', $user-> userStatus());
        $query -> bindValue(':userCreationDate', $user-> userCreationDate());
        $query -> execute();
    }

    public function hydrateUser($user){
        $query=$this->_db->prepare('SELECT * FROM users WHERE userName=:userName AND userHashedPassword=:userHashedPassword');
        $query->bindValue(':userName', $user->userName(), PDO::PARAM_STR);
        $query->bindValue(':userHashedPassword', $user->userHashedPassword(), PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $user->setUserStatus($result['userStatus']);
        $user->setUserId($result['userId']);
        $user->setUserCreationDate($result['userCreationDate']);
        return $user;
    }

    public function countUsers(){
        return $this -> _db -> query ('SELECT COUNT(*) FROM users') -> fetchColumn();
    }

    public function deleteUser (User $user){
        $this -> _db -> exec('DELETE FROM users WHERE userId = '.$user ->id());
    }

    public function setUserFromSession (User $user, array $sessionArray) {
        $user-> setUserId (intval($sessionArray["userId"]));
        $user-> setUserName ($sessionArray['userName']);
        $user-> setUserHashedPassword ($sessionArray['userHashedPassword']);
        $user-> setUserStatus (print($sessionArray['userStatus']));
        $user-> setUserCreationDate (print($sessionArray['userCreationDate']));
    }

    public function checkUserConnection(User $user){
        $query = $this->_db->prepare('SELECT userName, userHashedPassword FROM users WHERE userName=:userName AND userHashedPassword=:userHashedPassword');
        $query -> bindValue(':userName', $user->userName(), PDO::PARAM_STR);
        $query -> bindValue(':userHashedPassword', $user->userHashedPassword(), PDO::PARAM_STR);
        $query-> execute();
        $result = $query->fetch();  
        return isset($result["userName"]);
    }

    public function setUserSession(User $user){
        if ($this->checkUserConnection($user)){
            $_SESSION['vip']['userId']= $user->userId();
            $_SESSION['vip']['userName']= $user->userName();
            $_SESSION['vip']['userHashedPassword']= $user->userHashedPassword();
            $_SESSION['vip']['userStatus']= $user->userStatus();
            $_SESSION['vip']['userCreationDate']= $user->userCreationDate();
            return;
        }
    }


    
    public function doesUserNameAlreadyExist (User $user){
        $request = $this->_db->prepare ('SELECT userName FROM users WHERE userName=:userName');
        $request ->bindValue(':userName', $user->userName(), PDO::PARAM_STR);
        $request->execute();
        $result=$request->fetch();
        return isset($result["userName"]);
    }

}

?>