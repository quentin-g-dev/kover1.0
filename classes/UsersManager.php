<?

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
        echo 'Enregistrement terminé !';
    }

    public function countUsers(){
        return $this -> _db -> query ('SELECT COUNT(*) FROM users') -> fetchColumn();
    }

    public function deleteUser (User $user){
        $this -> _db -> exec('DELETE FROM users WHERE userId = '.$user ->id());
    }

    public function getUserInfo($id){
        if (is_int($id)){
            $query = $this -> _db -> query('SELECT userId, userName, userHashedPassword, userStatus, userCreationDate FROM users WHERE userId ='. $user -> id());
            $user = $query -> fetch(PDO::FETCH_ASSOC);    
            return new User ($user);
        } else {
            echo 'Aucun utilisateur ne semble correspondre à l\'identifiant fourni.';
            return null;
        }
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
        $query = $this -> _db -> prepare ('UPDATE users SET userName = :userName, userHashedPassword = :userHashedPassword, userStatus= :userStatus');
        $query -> bindValue(':userName', $user -> userName(), PDO::PARAM_INT);
        $query -> bindValue(':userHashedPassword', $user -> userHashedPassword(), PDO::PARAM_INT);
        $query -> bindValue(':userStatus', $user -> userStatus(), PDO::PARAM_INT);
        $query -> execute();
    }

    public function doesUserExist (User $user){
        $query = $this -> _db -> prepare ('SELECT userName FROM users ORDER BY userName');
        while ($result = $query -> fetch(PDO::FETCH_ASSOC)){
            if ($user -> userName() === $result){
                echo 'Ce nom d\'utilisateur est déjà utilisé : veuillez en choisir un autre. <a href="sign_up.php">Cliquez ici</a> pour renouveler votre demande d\'inscription.';
                return false;
            }        
            return false;
        }
    }
}

?>