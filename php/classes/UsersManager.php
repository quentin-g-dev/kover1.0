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
        $query = $this -> _db -> prepare('INSERT INTO users (user_name, passwd, creation_date) VALUES (?,?,?)');
        $result=$query -> execute([$user-> userName(), $user-> userHashedPassword(),  $user-> userCreationDate()]);
        return ($result);
    }

//////////////////////////////////////////////////////////////////// CRUD : READ
    public function hydrateUser(User $user){
        $query=$this->_db->prepare('SELECT * FROM users WHERE user_name=? AND passwd=?');
        $query->execute([$user->userName(),$user->userHashedPassword()]);
        $result = $query->fetch();
        $user->setUserId($result['id']);
        $user->setUserCreationDate($result['creation_date']);
        return $user;
    }

    public function countUsers(){
        return $this -> _db -> query ('SELECT COUNT(*) FROM users') -> fetchColumn();
    }

    public function checkUserConnection(User $user){
        $query = $this->_db->prepare('SELECT user_name, passwd FROM users WHERE user_name=? AND passwd=?');
        $query-> execute([$user->userName(),$user->userHashedPassword()]);
        $result = $query->fetch(); 
        return isset($result["user_name"]); 
    }

    public function doesUserNameAlreadyExist (string $userName){
        $request = $this->_db->prepare ('SELECT user_name FROM users WHERE user_name=?');
        $request->execute([$userName]);
        $result =$request->fetch();
        return isset($result["user_name"]);
    }

////////////////////////////////////////////////////////////////////CRUD : UPDATE

    public function updateUser(User $user) {
        $query = $this->_db-> prepare('UPDATE users SET user_name=?, passwd=? WHERE id=?');
        $query->execute([$user->userName(),$user-> userHashedPassword(),$user-> userId()]);
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
            $_SESSION['vip']['userCreationDate']= $user->userCreationDate();
            $_SESSION['vip']['langCode']= $user->userLangCode();
            return $_SESSION['vip'];
        }
    }

    public function setUserFromSession (User $user, array $sessionArray) {
        $user-> setUserId (intval($sessionArray["userId"]));
        $user-> setUserName ($sessionArray['userName']);
        $user-> setUserHashedPassword ($sessionArray['userHashedPassword']);
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
        $request = $this->_db->prepare ('SELECT proj_name FROM projects WHERE user_id=?');
        $request->execute([$user->userId()]);
        while($result =$request->fetch()){
            if ($result['proj_name'].trim()===$projName.trim()){
                $counter++;
            } 
        }
        if ($counter===0){
            $query = $this -> _db -> prepare('INSERT INTO projects (proj_name, user_id) VALUES (?,?)');
            $query -> execute([$projName, $user-> userId()]);
            return true;
        } else {
            return false;
        }
    }

    public function addLetter(User $user, string $projName, string $letterName, string $letterContent){
        $newProj = $this->addProj($user, $projName);
        $projId = $this->_db->query('SELECT proj_id FROM projects WHERE proj_name='.$projName.'');
        $query = $this -> _db -> prepare('INSERT INTO letters (user_id, letter_status, letter_content, letter_name, letter_creation_date, letter_last_update, proj_id) VALUES (?,?,?,?,?,?,?)');
        $query -> execute([$user-> userId(), 'version', $letterContent, $letterName, now(), now(), $projId]);
        $query->closeCursor();
        //UPDATE PROJ / VERSIONS => LETTER ID
        $secondQuery = $this -> _db -> prepare('SELECT proj_versions FROM projects WHERE user_id =?');
        $secondQuery -> execute([$user->userId()]);
        $result =$secondQuery->fetch();
        $secondQuery->closeCursor();
        $thirdQuery = $this -> _db -> prepare('UPDATE projects SET projVersions = '.$projVersions.' WHERE userId='.$user->userId().'');
    }
}

?>