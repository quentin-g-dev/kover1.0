<?
class User {
////////////////////////////////////////////////////////////////////////////////// Attributes
    private $_userId, $_userName, $_userHashedPassword, $_userStatus, $_db, $_userCreationDate, $_userLangCode;

////////////////////////////////////////////////////////////////////////////////// Constructor
    public function __construct($db){
        $this-> _db = $db;
    }

////////////////////////////////////////////////////////////////////////////////// Getters
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
    public function userCreationDate(){
        return $this-> _userCreationDate;
    }
    public function userLangCode(){
        return $this-> _userLangCode;
    }
    
////////////////////////////////////////////////////////////////////////////////////// Setters
    
public function setUserId(int $id){
        $this-> _userId = $id;
    }
    public function setUserName(string $name){
        if(isset($name) && strlen(htmlspecialchars($name))>0 && strlen(htmlspecialchars($name))<=30){
            $this-> _userName = htmlspecialchars($name);
        }
    }
    public function setUserHashedPassword(string $hashedPassword){
        $this-> _userHashedPassword = $hashedPassword;
    }
    public function setUserStatus(string $status){
         $this-> _userStatus = $status;
    }
    public function setUserCreationDate(string $date){
        $this-> _userCreationDate = $date;
    }
    public function setLangCode(string $langCode){
        $this-> _userLangCode = $langCode;
    }
}
?>