<nav class="hidden d-flex flex-row flex-wrap border-white justify-content-center align-items-center">

<?php
    // FOR CONNECTED USERS :
    if (isset ($_SESSION['user'])){
        $user = $_SESSION["user"];
        require_once './modules/user_checker.php';
        if (checkUserConnection($user['name'], $user['hashedPassword'])){
?>

    <a href="./index.php" class="mx-5 my-3">Nouveau projet</a>
    <a href="./profile.php?vip=<?echo $user['id'];?>" class="mx-5 my-3">Mon Profil</a>
    <a href="./myLetters.php" class="mx-5 my-3">Mes Lettres</a>
    <a href="./config.php" class="mx-5 my-3">Mes Paramètres</a>
    <a href="./index.php?disc=1" class="disconnect mx-5 my-3">Déconnexion</a>

<?php
        } else { 
            session_destroy();
            echo "Problème de connexion. Cliquez <a href=\"sign_in.php\">ici</a> pour vous connecter.";
        }
    } else {
        // FOR UNCONNECTED USERS :
?>

        <a href="./index.php" class="mx-5 my-3">Nouveau projet</a>
        <a href="./sign_in.php" class="mx-5 my-3">Connexion</a>
        <a href="./sign_up.php" class="mx-5 my-3">Inscription</a>
    
<?php 
    } 
?>

</nav>