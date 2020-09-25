<?

session_start();
if (isset ($_SESSION['userName'])){
    if (isConnected($_SESSION['userName'])){
        header ('index.php');
    }
} else {

$pageTitle = 'Kover - Inscription';

include './parts/head.php';

include './parts/header.php';

?>

<main class="signUp my-5">
    <h2 class="mb-3 text-center">Inscription</h2>
    <form action="post_subscription.php" method="post" id="signUpForm" class="d-flex flex-column justify-content-between align-items-center w-75 mw-100 mx-auto my-5" onsubmit="return evalSignUpForm();">
        <fieldset class="my-2">
            <label for="userName" class="mr-3">Choisissez un nom d'utilisateur</label>
            <input type="text" name="userName" id="userName" placeholder="Votre pseudo">
        </fieldset>
        <fieldset class="my-2">
            <label for="userPassword" class="mr-3">Choisissez un mot de passe</label>
            <input type="password" name="userPassword" id="userPassword" placeholder="">
        </fieldset>
        <fieldset class="my-2">
            <label for="userPasswordTwice" class="mr-3">Confirmez le mot de passe</label>
            <input type="password" name="userPasswordTwice" id="userPasswordTwice" placeholder="">
        </fieldset>
        <button class="btn text-info border-info mt-3 " type="submit" >CONFIRMER L'INSCRIPTION</button>
    </form>
</main>

<? 

include './parts/footer.php'; 

?>

<script src="./js/jquery-3.5.1.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/sign_up.js"></script>
        
</body>

</html>


<?
}
?>

