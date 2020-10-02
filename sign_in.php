<?php
session_start();
/*if (isset($_POST['signInSubmit'])){
    if (isset($_POST['signInName']) && isset($_POST['signInPass'])){
        require './modules/db_connect.php';
        require './classes/User.php';
        require './classes/UsersManager.php';
        $userToTest = new User($db);
        $testManager = new UsersManager($db);
        $userToTest->setUserName(htmlspecialchars($_POST['signInName']));
        $userToTest->setUserHashedPassword(hash('whirlpool',htmlspecialchars($_POST['signInPass'])));
        $testManager->isUserConnected($userToTest);
        return;
        if ($testManager->isUserConnected($userToTest)){
            $testManager->hydrateUser($userToTest);
            setUserSession($userToTest);
            require './modules/db_disconnect.php';
            header ('Location:profile.php?vip='.$user->userId());
            echo 'utilisateur identifié';
            return;
        } else {
            session_destroy();
            header('Location:index.php');
            return;
        }
    } 
}
require './modules/user_checker.php';

if (isset ($_SESSION['user'])){
    $user = $_SESSION['user'];
    require './modules/user_checker.php';

    if (checkUserConnection($user['name'], hash('whirlpool',$user['hashedPassword']))){
        header ('Location:profile.php?vip='.$user['id']);
        return;

    } else {
        session_destroy();
        header ('Location:sign_in.php');
        return;
    }
} */

$pageTitle = 'Kover - Connexion';

include './php/parts/allpages_parts/head.php';
include './php/parts/allpages_parts/header.php';

include './php/parts/forms/connection_form.php';

include './php/parts/allpages_parts/footer.php';
?>

<script src="./assets/js/jquery-3.5.1.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/sign_in.js"></script>
<script src="./assets/js/nav_menu.js"></script>
        
</body>

</html>
<?
?>



