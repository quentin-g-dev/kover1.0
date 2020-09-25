<nav class="hidden d-flex flex-row flex-wrap border-white justify-content-center align-items-center">
<a href="./index.php" class="mx-5 my-3">
        Nouveau projet   
    </a>
<?
if (isset($_SESSION['userName']) && isset($_SESSION['userHashedPassword'])){
    require './modules/user_checker.php';
    if (checkUserConnection($_SESSION['userName'], $_SESSION['userName'])){
?>

    <a href="./profile.php" class="mx-5 my-3">
        <span class="user-name">
<?
echo $_SESSION["userName"];
?>
        </span>
        Mon Profil
    </a>
    <a href="./myLetters.php" class="mx-5 my-3">
        Mes Lettres    
    </a>
    <a href="./config.php" class="mx-5 my-3">
        Mes Paramètres
    </a>
    <a href="./index?disc.php" class="disconnect" class="mx-5 my-3">
        Déconnexion
    </a>

<?
    }
} else {

    ?>
        <a href="./sign_in.php" class="mx-5 my-3">
            Connexion
        </a>
        <a href="./sign_up.php" class="mx-5 my-3">
            Inscription
        </a>
    
    <?
        }
?>

</nav>
