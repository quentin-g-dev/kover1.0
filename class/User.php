<?

class User {
    private $_userId, $_userName, $_userHashedPassword, $_userStatus;

    public function userId(){
        return $this-> _userId;
    }
    public function userName(){
        return $this-> _userName;
    }
    public function userHashedPassword(){
        return $this-> _userHashedPassword;
    }
    public function userStatus(){
        return $this-> _userStatus;
    }

    public function setUserId(){
        $this-> _userId = $userId;
    }
    public function setUserName($name){
        if(isset($name) && htmlspecialchars($name).strlen>0 &&htmlspecialchars($name).strlen<25){
            $this-> _userName = $name;
        }
    }
    public function setUserStatus(){
         $this-> _userStatus = $userStatus;
    }

    public function __construct($db){
        $this-> _db = $db;
    }

}

?>