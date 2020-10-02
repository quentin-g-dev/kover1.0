<?
session_start();
<<<<<<< HEAD
/*require './modules/user_checker.php';
=======
require './modules/user_checker.php';
>>>>>>> d17f3eeda49729fb4c1cb2b986af1fc2639ed258
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
<<<<<<< HEAD

=======
        require './classes/User.php';
        require './classes/UsersManager.php';
        include './modules/db_disconnect.php';
>>>>>>> d17f3eeda49729fb4c1cb2b986af1fc2639ed258

    //ECHEC DE L'INSCRIPTION :

        if (!checkUserName(htmlspecialchars($_POST['userName']))||!checkUserPassword(htmlspecialchars($_POST['userPassword']))||htmlspecialchars($_POST['userPassword']) !== htmlspecialchars($_POST['userPasswordTwice'])){
<<<<<<< HEAD
            
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
=======
            $pageTitle = 'Kover - Echec de l\'inscription';

            include './parts/head.php';
            include './parts/header.php';
            include './parts/nav_menu.php';
?>

<main>
    <h2>Votre inscription a échoué</h2>
    <p>Une erreur a été détectée et votre inscription n'a pas pu être menée à son terme. Nous vous invitons à <a href="sign_up.php">renouveler votre demande d'inscription</a>. Si vous avez déjà un compte, <a href="sign_in.php">cliquez plutôt ici</a> pour vous connecter.</p>
</main>

<?
        } else {

// SUCCES DE L'INSCRIPTION :
            include './modules/db_connect.php';
>>>>>>> d17f3eeda49729fb4c1cb2b986af1fc2639ed258
            $currentUser = new User($db);
            $currentManager = new UsersManager($db);
            $currentUser->setUserName(htmlspecialchars($_POST['userName']));
            $currentUser->setUserHashedPassword(hash("whirlpool", htmlspecialchars($_POST['userPassword'])));
            $currentUser->setUserCreationDate(date('Y-m-d H:i:s'));
            $currentUser->setUserStatus('user');
            $currentManager -> addUser($currentUser);
            
            require './modules/user_session.php';
<<<<<<< HEAD
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
=======
            setUserSession($_POST['userName'],$_POST['userPassword']);
            include './modules/db_disconnect.php';

            $pageTitle = 'Kover - Bienvenue '. $currentUser -> userName();
            include './parts/head.php';
            include './parts/header.php';
            include './modules/db_connect.php';
            
?>

<main
        class="container full-container d-flex flex-column p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-around align-items-baseline h-100 rounded"
        id="post_subscruption">
<h2 class="text-center mb-5">
    Bienvenue <? echo $currentUser -> userName(); ?>
</h2>
<p class="text-center">Votre enregistrement est terminé, merci pour votre confiance.</p>
<p class="text-center">Découvrez votre espace personnel <a href="profile.php">en cliquant ici</a>.</p>
<p class="text-center">Pour réaliser dès maintenant un publipostage, <a href="index.php">c'est par là</a>.</p>

<main class="text-center">

<?
        }

        include './parts/footer.php'; 
?>

<script src="./js/jquery-3.5.1.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/nav_menu.js"></script>
>>>>>>> d17f3eeda49729fb4c1cb2b986af1fc2639ed258

        
</body>

</html>
<?

<<<<<<< HEAD
 //   }
//}
=======
    }
}
>>>>>>> d17f3eeda49729fb4c1cb2b986af1fc2639ed258

?>
