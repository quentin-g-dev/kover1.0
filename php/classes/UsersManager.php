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

    public function getUserId($user){
        $request = $this->_db->prepare ('SELECT user_id FROM users WHERE user_name=?');
        $request->execute([$user->$userName()]);
        $result =$request->fetch();
        return $result["user_name"];
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


    public function addLetter(User $user, string $projName, string $letterName, string $letterContent){
        $query = $this -> _db -> prepare('INSERT INTO letters (user_id, proj_name, letter_status, letter_title, letter_content, letter_creation, letter_lastedit) VALUES (?,?,?,?,?,?,?)');
        $query -> execute([$user-> userId(), $projName, 'version',$letterName, $letterContent,  date("d.m.y"), date("d.m.y")]);
        return $query;
    }

    public function countLetters(User $user){
        $sql = 'SELECT COUNT(letter_id) AS howMany FROM letters WHERE user_id='.$user->userId().'';
        $request = $this->_db->prepare($sql);
        $request->execute();
        $result = $request->fetch();
        return $result['howMany'];
    }

    public function selectLetters(User $user){
        $query=$this->_db->prepare('SELECT * FROM letters WHERE user_id=?');
        $query->execute([$user->userId()]);
        $result = $query->fetchAll();
        return $result;
    }

    public function deleteLetter (User $user, $letterId){
        $query=$this->_db->prepare('DELETE FROM letters WHERE user_id=? AND letter_id=?');
        $query->execute([$user->userId(), $letterId]);
        return $query;
    }

    public function selectProject(User $user, string $projName, string $orderedBy, string $ASCorDESC){
        $query=$this->_db->prepare('SELECT * FROM letters WHERE user_id=? AND proj_name=? ORDER BY '.$orderedBy.' '.$ASCorDESC.'');
        $query->execute([$user->userId(), $projName]);
        $result = $query->fetchAll();
        return $result;
    }

    public function deleteProject(User $user, string $projName){
        $query=$this->_db->prepare('DELETE FROM letters WHERE user_id=? AND proj_name=?');
        $query->execute([$user->userId(), $projName]);
        return $query;
    }
}

?>