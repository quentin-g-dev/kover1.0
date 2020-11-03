<?
session_start();

/////////////////////////////////////////// VERIFICATION DE SESSION EN COURS EVENTUELLE
include './php/modules/check_vip_session.php';

/////////////////////////////////////////// REDIRECTION VERS INDEX.PHP SI SESSION EN COURS
if (isset ($vip)){
    header ('Location:index.php');

} else {
    
    if (!isset($_POST['userName']) || !isset($_POST['userPassword']) || !isset($_POST['userPasswordTwice'])){
///////////////////////// Rechargement du formulaire d'inscription s'il est envoyé incomplet
        header ('sign_up.php');
        
    } else {
        
        require './php/modules/db_connect.php';
        require './php/classes/User.php';
        require './php/classes/UsersManager.php';
        $newUser = new User($db);
        $controler = new UsersManager($db);
        $newUser->setUserName(htmlspecialchars(($_POST['userName'])));
        if ($controler->doesUserNameAlreadyExist($newUser->userName())){

///////////////////////////////////////////////////////////////////////ECHEC DE L'INSCRIPTION          
            $pageTitle = 'Kover - Echec de l\'inscription';
            include './php/parts/allpages_parts/head.php';
            include './php/parts/allpages_parts/header.php';
            include './php/parts/subscription/subscription_fail.php';
        } else {
            $newUser->setUserHashedPassword(hash("whirlpool", htmlspecialchars($_POST['userPassword'])));
            $newUser->setUserCreationDate(date('Y-m-d H:i:s'));
            $newUser->setUserStatus('user');
            $adding=$controler -> addUser($newUser);
            if (!$adding){
                $pageTitle = 'Kover - Echec de l\'inscription';
                include './php/parts/allpages_parts/head.php';
                include './php/parts/allpages_parts/header.php';
                include './php/parts/subscription/subscription_fail.php';
            } else {
 ///////////////////////////////////////////////////////////////////////SUCCES DE L'INSCRIPTION
                $controler -> setUserSession($newUser);
                include './php/modules/db_disconnect.php';

                $pageTitle = 'Kover - '. $newUser->userName();
                include './php/parts/allpages_parts/head.php';
                include './php/parts/allpages_parts/header.php';
                include './php/parts/subscription/subscription_success.php';
            }
        }

    include './php/parts/allpages_parts/footer.php'; 
?>

<script src="./assets/js/jquery-3.5.1.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/nav_menu.js"></script>
<script src="./assets/js/translations.js"></script>
<script src="./assets/js/languages.js"></script>


</body>

</html>

<?

    }
}

?>