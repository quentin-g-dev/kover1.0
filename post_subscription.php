<?
session_start();
/*require './modules/user_checker.php';
if (isset ($_SESSION['user'])){
    $user=$_SESSION['user'];
    if (checkUserConnection($user['name'], $user["hashedPassword"])){
        header ('Location:index.php');
    } else {
        session_destroy();
        header ('Location:sign_up.php');
    }
} else {
    if (!isset($_POST['userName']) || !isset($_POST['userPassword']) || !isset($_POST['userPasswordTwice'])){
        header ('sign_up.php');
    } else {
        include './modules/db_connect.php';


    //ECHEC DE L'INSCRIPTION :

        if (!checkUserName(htmlspecialchars($_POST['userName']))||!checkUserPassword(htmlspecialchars($_POST['userPassword']))||htmlspecialchars($_POST['userPassword']) !== htmlspecialchars($_POST['userPasswordTwice'])){
            
            */
            
            $pageTitle = 'Kover - Echec de l\'inscription';
            //include './modules/db_disconnect.php';

            include './php/parts/allpages_parts/head.php';
            include './php/parts/allpages_parts/header.php';
            
            include './php/parts/subscription/subscription_fail.php';

?>



<?
      //  } else {

// SUCCES DE L'INSCRIPTION :
            /*include './modules/db_connect.php';
            $currentUser = new User($db);
            $currentManager = new UsersManager($db);
            $currentUser->setUserName(htmlspecialchars($_POST['userName']));
            $currentUser->setUserHashedPassword(hash("whirlpool", htmlspecialchars($_POST['userPassword'])));
            $currentUser->setUserCreationDate(date('Y-m-d H:i:s'));
            $currentUser->setUserStatus('user');
            $currentManager -> addUser($currentUser);
            
            require './modules/user_session.php';
            setUserSession($currentUser);
            include './modules/db_disconnect.php';*/

            $pageTitle = 'Kover - Bienvenue '. $currentUser -> userName();
            include './php/parts/allpages_parts/head.php';
            include './php/parts/allpages_parts/header.php';
            include './php/parts/subscription/subscription_success.php';
            //include './modules/db_connect.php';
?>


<?
      //  }

    include './parts/footer.php'; 
?>

<script src="./assets/js/jquery-3.5.1.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/nav_menu.js"></script>

        
</body>

</html>
<?

 //   }
//}

?>
