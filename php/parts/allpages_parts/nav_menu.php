<nav class="hidden d-flex flex-row flex-wrap border-white justify-content-center align-items-center">

<?php
    if (isset ($vip)){
            // FOR CONNECTED USERS :
?>

    <a href="./index.php" class="mx-2 my-3">
        Nouveau projet
    </a>
    <a href="./profile.php?vip=<?echo $vip->userId();?>" class="mx-2 my-3">
        Mon Profil
    </a>
    <a href="./letters.php?vip=<?echo $vip->userId();?>" class="mx-2 my-3">
        Mes Lettres
    </a>
    <a href="./profile.php?vip=<?echo $vip->userId();?>&sect=param" class="mx-2 my-3">
        Mes Paramètres
    </a>
    <a href="./index.php?disc=1" class="disconnect mx-2 my-3">
        Déconnexion
    </a>

<?php
        
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