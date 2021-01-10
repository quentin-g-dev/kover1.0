<?php

class UsersManagerTest  {

    public function __construct(){
    }

    /*Requête de nettoyage de la table users si besoin :  */
    // $db->query('DELETE FROM `users` WHERE user_status = "test-user"');

    
    public function testAddUser(object $testUser) {
        include './php/modules/db_connect.php';
        
        $initialNumber = $db-> query ('SELECT COUNT(*) FROM users') -> fetchColumn();
        include_once './php/classes/UsersManager.php';
        $testManager = new UsersManager($db);
        $testManager->addUser($testUser);    
        $finalNumber = $db-> query ('SELECT COUNT(*) FROM users') -> fetchColumn();

        include_once './php/modules/db_disconnect.php';
        return($finalNumber - $initialNumber);
    }

    public function testHydrateUser (object $dryUser){
        include './php/modules/db_connect.php';
        include_once './php/classes/UsersManager.php';
        $testHydrater = new UsersManager($db);
        $testHydrater->hydrateUser($dryUser);    
        include_once './php/modules/db_disconnect.php';
        $status =  $dryUser->userStatus();
        return $status;
    }

    public function testUpdateUser (object $user) {
        include './php/modules/db_connect.php';
        include_once './php/classes/UsersManager.php';
        $testUpdater = new UsersManager($db);
        $updating = $testUpdater->updateUser($user);    
        include_once './php/modules/db_disconnect.php';
        return $updating;
    }

    public function testDeleteUser (object $user) {
        include './php/modules/db_connect.php';
        include_once './php/classes/UsersManager.php';
        $testDeleter = new UsersManager($db);
        $deleting = $testDeleter->deleteUser($user);    
        include_once './php/modules/db_disconnect.php';
        return $deleting;
    }


  
}