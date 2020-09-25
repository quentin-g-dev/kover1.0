<?

session_start();
if (isset ($_SESSION['userName'])){
    if (isConnected($_SESSION['userName'])){
        header ('index.php');
    }
} else {
    if (!isset($_POST['userName']) || !isset($_POST['userPassword']) || !isset($_POST['userPasswordTwice'])){
        header ('sign_up.php');
    } else {
        include './modules/db_connect.php';
        require './classes/User.php';
        require './classes/UsersManager.php';
        require "./modules/user_checker.php";

//ECHEC DE L'INSCRIPTION :

        if (checkUserName(htmlspecialchars($_POST['userName']))=== false||checkUserPassword(htmlspecialchars($_POST['userPassword']))=== false||htmlspecialchars($_POST['userPassword']) !== htmlspecialchars($_POST['userPasswordTwice'])){
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
        include './modules/db_disconnect.php';
    } else {

// SUCCES DE L'INSCRIPTION :
        
            $pageTitle = 'Kover - Bienvenue '. htmlspecialchars($_POST['userName']);

            include './parts/head.php';
            
            include './parts/header.php';

            include './modules/db_connect.php';
            
            $currentUser = new User($db);
            $currentManager = new UsersManager($db);
            $currentUser->setUserName($_POST['userName']);
            $currentUser->setUserHashedPassword($_POST['userPassword']);
            $currentUser->setUserCreationDate(date('Y-m-d H:i:s'));
            $currentUser->setUserStatus('user');
            $currentManager -> addUser ($currentUser);
            $_SESSION['userName'] = $currentUser->userName();
            $_SESSION['userHashedPassword'] = $currentUser->userHashedPassword();
            include './modules/db_disconnect.php';
            
?>

<main class="my-5">

<h2 class="text-center mb-3">
    Bienvenue <? echo $currentUser -> userName(); ?>
</h2>
<p class="text-center">Votre enregistrement est terminé, merci pour votre confiance.</p>
<p class="text-center">Visitez votre espace personnel <a href="profile.php">en cliquant ici</a>.</p>
<p class="text-center">Pour réaliser dès maintenant un publipostage, <a href="index.php">c'est par là</a>.</p>

<main class="text-center">

<?
        }

        include './parts/footer.php'; 
?>

<script src="./js/jquery-3.5.1.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/nav_menu.js"></script>

        
</body>

</html>
<?

    }
}

?>
