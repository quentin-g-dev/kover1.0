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

        require "./modules/form_checker.php";

        if (!checkUserName(htmlspecialchars($_POST['userName']))||!checkUserPassword(htmlspecialchars($_POST['userPassword']))||htmlspecialchars($_POST['userPassword']) !== htmlspecialchars($_POST['userPasswordTwice'])){
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



?>

<main>




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
