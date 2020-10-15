<?php

class UsersManager {

///////////////////////////////////////////////////////////////////////// ATTRIBUTES
    private $_db;

////////////////////////////////////////////////////////////////////////  CONSTRUCTOR
    public function __construct($db){
        $this-> _db = $db;
    }

////////////////////////////////////////////////////////////////////CRUD FUNCTIONS
////////////////////////////////////////////////////////////////////CRUD : CREATE
    public function addUser (User $user){
        $query = $this -> _db -> prepare('INSERT INTO users (userName, userHashedPassword, userStatus, userCreationDate, userLangCode) VALUES (:userName, :userHashedPassword, :userStatus, :userCreationDate, :userLangCode)');
        $query -> bindValue(':userName', $user-> userName());
        $query -> bindValue(':userHashedPassword', $user-> userHashedPassword());
        $query -> bindValue(':userCreationDate', $user-> userCreationDate());
        $query -> bindValue(':userLangCode', $user-> userLangCode());
        $query -> execute();
    }

//////////////////////////////////////////////////////////////////// CRUD : READ
    public function hydrateUser($user){
        $query=$this->_db->prepare('SELECT * FROM users WHERE userName=:userName AND userHashedPassword=:userHashedPassword');
        $query->bindValue(':userName', $user->userName(), PDO::PARAM_STR);
        $query->bindValue(':userHashedPassword', $user->userHashedPassword(), PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
        $user->setUserStatus($result['userStatus']);
        $user->setUserId($result['userId']);
        $user->setUserCreationDate($result['userCreationDate']);
        return $user;
    }

    public function countUsers(){
        return $this -> _db -> query ('SELECT COUNT(*) FROM users') -> fetchColumn();
    }

    public function checkUserConnection(User $user){
        $query = $this->_db->prepare('SELECT userName, userHashedPassword FROM users WHERE userName=:userName AND userHashedPassword=:userHashedPassword');
        $query -> bindValue(':userName', $user->userName(), PDO::PARAM_STR);
        $query -> bindValue(':userHashedPassword', $user->userHashedPassword(), PDO::PARAM_STR);
        $query-> execute();
        $result = $query->fetch();  
        return isset($result["userName"]);
    }

    public function doesUserNameAlreadyExist (string $userName){
        $request = $this->_db->prepare ('SELECT userName FROM users WHERE userName=:userName');
        $request ->bindValue(':userName', $userName, PDO::PARAM_STR);
        $request->execute();
        $result =$request->fetch();
        return isset($result["userName"]);
    }

////////////////////////////////////////////////////////////////////CRUD : UPDATE

    public function updateUser(User $user) {
        $query = $this->_db-> prepare('UPDATE users SET userName=:userName, userHashedPassword=:userHashedPassword, userLangCode=:userLangCode WHERE userId=:userId');
        $query->bindValue(':userName', $user->userName());
        $query -> bindValue(':userHashedPassword', $user-> userHashedPassword());
        $query -> bindValue(':userId', $user-> userId());
        $query -> bindValue(':userLangCode', $user-> userLangCode());
        $query->execute();
    }
//////////////////////////////////////////////////////////////////// CRUD : DELETE

    public function deleteUser (User $user){
        $this -> _db -> exec('DELETE FROM users WHERE userId = '.$user ->id());
    }

////////////////////////////////////////////////////////////////////// NO-CRUD FUNCTIONS

    public function setUserSession(User $user){
        if ($this->checkUserConnection($user)){
            $_SESSION['vip']['userId']= $user->userId();
            $_SESSION['vip']['userName']= $user->userName();
            $_SESSION['vip']['userHashedPassword']= $user->userHashedPassword();
            $_SESSION['vip']['userStatus']= $user->userStatus();
            $_SESSION['vip']['userCreationDate']= $user->userCreationDate();
            $_SESSION['vip']['langCode']= $user->userLangCode();
            return $_SESSION['vip'];
        }
    }

    public function setUserFromSession (User $user, array $sessionArray) {
        $user-> setUserId (intval($sessionArray["userId"]));
        $user-> setUserName ($sessionArray['userName']);
        $user-> setUserHashedPassword ($sessionArray['userHashedPassword']);
        $user-> setUserStatus ($sessionArray['userStatus']);
        $user-> setUserCreationDate ($sessionArray['userCreationDate']);
        if (isset($sessionArray['langCode'])){        
            $user-> setLangCode ($sessionArray['langCode']);
        } else {
            $user-> setLangCode ('FR');
        }
    }

    //////////////////////////////////////////////////////////////////////////////// LETTERS MANAGER

    public function addProj (User $user, string $projName){
        $counter=0;
        $request = $this->_db->prepare ('SELECT projName FROM projects WHERE userId=:userId');
        $request ->bindValue(':userId', $user->userId(), PDO::PARAM_STR);
        $request->execute();
        while($result =$request->fetch()){
            if ($result['projName'].trim()===$projName.trim()){
                $counter++;
            } 
        }
        if ($counter===0){
            $query = $this -> _db -> prepare('INSERT INTO projects (projName, userId) VALUES (:projName, :userId)');
            $query -> bindValue(':projName', $projName);
            $query -> bindValue(':userId', $user-> userId());
            $query -> execute();
            return true;
        } else {
            return false;
        }
    }

    public function addLetter(User $user, string $projName, string $letterName, string $letterContent){
        $newProj = $this->addProj($user, $projName);
        $projId = $this->_db->query('SELECT projId FROM projects WHERE projName='.$projName.'');
        $query = $this -> _db -> prepare('INSERT INTO letters (userId, letterStatus, letterContent, letterName, letterCreationDate, letterLastUpdate, projId) VALUES (:userId, :letterStatus, :letterContent, :letterName, :letterCreationDate, :letterLastUpdate, :projId)');
        $query -> bindValue(':userId', $user-> userId());
        $query -> bindValue(':letterStatus', 'version');
        $query -> bindValue(':letterContent', $letterContent);
        $query -> bindValue(':letterName', $letterName);
        $query -> bindValue(':letterCreationDate', now());
        $query -> bindValue(':letterLastUpdate', now());
        $query -> bindValue(':projId', $projId);
        $query -> execute();
        $query->closeCursor();
        //UPDATE PROJ / VERSIONS => LETTER ID
        $secondQuery = $this -> _db -> prepare('SELECT projVersions FROM projects WHERE userId =:userId');
        $secondQuery -> bindValue(':userId', $user->userId());
        $secondQuery -> execute();
        $result =$secondQuery->fetch();
        $secondQuery->closeCursor();
        $thirdQuery = $this -> _db -> prepare('UPDATE projects SET projVersions = '.$projVersions.' WHERE userId='.$user->userId().'');
    }
}

?>