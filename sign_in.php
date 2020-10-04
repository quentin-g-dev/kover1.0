<?php
session_start();
/////////////////////////////////////////// VERIFICATION DE SESSION EN COURS EVENTUELLE
include './php/modules/check_vip_session.php';

/////////////////////////////////////////// REDIRECTION VERS INDEX.PHP SI SESSION EN COURS
if (isset ($vip)){
    header ('Location:index.php');
} else {

    if (isset($_POST['signInSubmit'])&& isset($_POST['signInName']) && isset($_POST['signInPass'])){
        require './php/modules/db_connect.php';
        require './php/classes/User.php';
        require './php/classes/UsersManager.php';
        $newUser = new User ($db);
        $controler = new UsersManager ($db);
        $newUser->setUserName(htmlspecialchars(($_POST['signInName'])));
        $newUser->setUserHashedPassword(hash('whirlpool',htmlspecialchars($_POST['signInPass'])));
        $controler->checkUserConnection($newUser);
        require './php/modules/db_disconnect.php';

        if ($controler->checkUserConnection($newUser)){
            $controler->hydrateUser($newUser);

            $controler->setUserSession($newUser);
            $controler->setUserFromSession($newUser, $_SESSION['vip']);

            header ("Location:./profile.php?vip=".$newUser->userId());
        } else {
            session_destroy();
            header ("Location:./profile.php?vip=".$newUser->userId());
        }
    } 

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
<script src="./assets/js/translations.js"></script>
<script src="./assets/js/languages.js"></script>
</body>

</html>
<?php
        
    
}
?>