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
        $query -> bindValue(':userName', $user-> userName(), PDO::PARAM_INT);
        $query -> bindValue(':userHashedPassword', $user-> userHashedPassword(), PDO::PARAM_INT);
        $query -> bindValue(':userStatus', $user-> userStatus(), PDO::PARAM_INT);
        $query -> bindValue(':userCreationDate', $user-> userCreationDate(), PDO::PARAM_INT);
        $query -> execute();
    }

    public function countUsers(){
        return $this -> _db -> query ('SELECT COUNT(*) FROM users') -> fetchColumn();
    }

    public function deleteUser (User $user){
        $this -> _db -> exec('DELETE FROM users WHERE userId = '.$user ->id());
    }

    /*

    public function getUserInfo(User $user){
        require ('modules/db_connect.php');
        $sql = 'SELECT userId, userName, userHashedPassword, userStatus, userCreationDate FROM users WHERE userName =:userName';
        $query = $db->prepare($sql);
        $query->bindValue(':userName', $user->userName());
        $query->execute();
        $userInfo = $query->fetch();
        require ('modules/db_disconnect.php');
        return $userInfo;
    }

    public function getUsersList(){
        $users = [];
        $query = $this -> _db -> prepare ('SELECT userId, userName, userHashedPassword, userStatus, userCreationDate FROM users ORDER BY userName');
        while ($result = $query -> fetch(PDO::FETCH_ASSOC)){
            $users[] = new User ($result);
        }
        return $users;
    }

    public function updateUser (User $user) {
        require ('modules/db_connect.php');
        $sql = 'UPDATE users SET userName =:userName, userHashedPassword=:userHashedPassword, userStatus=:userStatus WHERE userId=:userId';
        $query = $db->prepare($sql);
        $query -> bindValue(':userName', $user->userName(), PDO::PARAM_INT);
        $query -> bindValue(':userHashedPassword', $user->userHashedPassword(), PDO::PARAM_INT);
        $query -> bindValue(':userStatus', $user -> userStatus(), PDO::PARAM_INT);
        $query -> bindValue(':userId', $user -> userId(), PDO::PARAM_INT);
        $query -> execute();
        require ('modules/db_disconnect.php');
    }

    public function doesUserExist (User $user){
        $result = 0;
        $request = $this -> _db -> query ('SELECT userName FROM users');
        while ($data = $request -> fetch()){
            if ($data['userName'] === $user -> userName()){
                $result++;
            }        
        }
        if ($result>0){
            echo 'Ce nom d\'utilisateur est indisponible : veuillez en choisir un autre.';
            return true;
        } else {
            return false;
        }
    }

    public function isUserConnected (User $user){
        $sql = 'SELECT userName, userHashedPassword FROM users WHERE userName=:userName';
        $query = $this-> _db->prepare($sql);
        $query->bindValue(':userName', $user->userName(), PDO::PARAM_INT);
        $query->execute();
        $userData = $query->fetch();
        $result = ($user->userHashedPassword()=== $userData["userHashedPassword"]);
        var_dump ($result);
        var_dump ($user->userHashedPassword());
        var_dump ($userData["userHashedPassword"]);
        return $result;
    }

    public function hydrateUser(User $user){
        $userInfo = $this->getUserInfo($user);
        echo $userInfo;
        $user ->setUserId($userInfo['userId']);
        $user -> setUserHashedPassword($userInfo['userHashedPassword']);
        $user ->setUserStatus($userInfo['userStatus']);
        $user -> setUserCreationDate($userInfo['userCreationDate']);
        return $user;
    }
    public function findUserById($id){
        require ('modules/db_connect.php');
        $sql = 'SELECT userId, userName, userHashedPassword, userStatus, userCreationDate FROM users WHERE userId =:userId';
        $query = $db->prepare($sql);
        $query->bindValue(':userId', $id, PDO::PARAM_INT);
        $query->execute();
        $userInfo = $query->fetch();
        require ('modules/db_disconnect.php');
        return $userInfo;
    }
    */
}

?>