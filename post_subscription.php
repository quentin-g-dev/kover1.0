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
        $db = dbConnect();
        require './classes/User.php';
        require './classes/UsersManager.php';
        require "./modules/form_checker.php";

        if (checkUserName(htmlspecialchars($_POST['userName']))=== false||checkUserPassword(htmlspecialchars($_POST['userPassword']))=== false||htmlspecialchars($_POST['userPassword']) !== htmlspecialchars($_POST['userPasswordTwice'])){
            $pageTitle = 'Kover - Echec de l\'inscription';

            include './parts/head.php';
            
            include './parts/header.php';
        
?>

<main>
    <h2>Votre inscription a échoué</h2>
    <p>Une erreur a été détectée et votre inscription n'a pas pu être menée à son terme. Nous vous invitons à <a href="sign_up.php">renouveler votre demande d'inscription</a>. Si vous avez déjà un compte, <a href="sign_in.php">cliquez plutôt ici</a> pour vous connecter.</p>
</main>

<?
        } else {
        
            $pageTitle = 'Kover - Bienvenue '.htmlspecialchars($_POST['userName']);

            include './parts/head.php';
            
            include './parts/header.php';

            include './modules/db_connect.php';
            
            $db = db_connect();
            $currentUser = new User($db);
            $currentManager = new UsersManager($db);
            $currentUser->setUserName($_POST['userName']);
            $currentUser->setUserHashedPassword($_POST['userPassword']);
            $currentUser->setUserCreationDate(date('Y-m-d H:i:s'));
            $currentUser->setUserStatus('user');
            $currentManager -> addUser ($currentUser);
            $db=null;
            
?>

<main>

<h2>
    Bienvenue <? echo $currentUser -> userName(); ?>
</h2>


<main>

<?
        }

        include './parts/footer.php'; 
?>



<script src="./js/jquery-3.5.1.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/sign_up.js"></script>
        
</body>

</html>
<?

    }
}

?>
