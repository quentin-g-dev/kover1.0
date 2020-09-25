<?

class User {

    //Attributes
    private $_userId, $_userName, $_userHashedPassword, $_userStatus, $_db, $_userCreationDate;

    //Constructor
    public function __construct($db){
        $this-> _db = $db;
    }

    //Getters
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
    
    //Setters
    public function setUserId($id){
        $this-> _userId = $id;
    }
    public function setUserName($name){
        if(isset($name) && strlen(htmlspecialchars($name))>0 && strlen(htmlspecialchars($name))<25){
            $this-> _userName = htmlspecialchars($name);
        }
    }
    public function setUserHashedPassword($password){
        $this-> _userHashedPassword = hash('whirlpool',htmlspecialchars($password));
   }
    public function setUserStatus($status){
         $this-> _userStatus = $status;
    }
    public function setUserCreationDate(string $date){
        $this-> _userCreationDate = $date;
   }
}

?>