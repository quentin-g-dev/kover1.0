
<nav class="d-none d-lg-flex flex-row flex-wrap border-white justify-content-center align-items-center">
    <select name="selectLang" id="selectLang" class="selectLang">
        <option value=""><?echo $_SESSION['langCode']?></option>
        <option value="FR">Français</option>
        <option value="ES">Espagnol</option>
        <option value="EN">Anglais</option>
    </select>
    <input type="hidden" name="langInput" id="langInput" value="<?php echo $_SESSION['langCode'];?>">
<?php
    if (isset ($vip)){
            // FOR CONNECTED USERS :
?>

    <a href="./index.php" class="mx-2 my-3 text-white">
        Nouveau projet
    </a>
    <a href="./profile.php?vip=<?echo $vip->userId();?>" class="mx-2 my-3 text-white">
        Mon Profil
    </a>
    <a href="./profile.php?vip=<?echo $vip->userId();?>&sect=letters" class="mx-2 my-3 text-white">
        Mes Lettres
    </a>
    <a href="./profile.php?vip=<?echo $vip->userId();?>&sect=param" class="mx-2 my-3 text-white">
        Mes Paramètres
    </a>
    <a href="./index.php?disc=1" class="disconnect mx-2 my-3 text-white">
        Déconnexion
    </a>

<?php
        
    } else {
        // FOR UNCONNECTED USERS :
?>

        <a href="./index.php" class="mx-5 my-3 text-white">Nouveau projet</a>
        <a href="./sign_in.php" class="mx-5 my-3 text-white">Connexion</a>
        <a href="./sign_up.php" class="mx-5 my-3 text-white">Inscription</a>
    
<?php 
    } 
?>

</nav>