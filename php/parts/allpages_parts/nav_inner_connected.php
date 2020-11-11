<span id="navInnerConnected"
    class="d-none d-md-flex mt-2 mb-3 flex-column flex-md-row flex-no-wrap border-white justify-content-center align-items-center">
    <a href="./index.php" class="mx-2 my-3  my-lg-3 display-5 font-weight-bold text-white">
        Nouveau projet
    </a>
    <a href="./profile.php?vip=<?echo $vip->userId();?>"
        class="mx-2 my-3 my-lg-3   display-5 font-weight-bold text-white">
        Mon Profil
    </a>
    <a href="./profile.php?vip=<?echo $vip->userId();?>&sect=letters"
        class="mx-2 my-3 my-lg-3  display-5 font-weight-bold text-white">
        Mes Lettres
    </a>
    <a href="./profile.php?vip=<?echo $vip->userId();?>&sect=param"
        class="mx-2 my-3 my-lg-3  display-5 font-weight-bold text-white">
        Mes Paramètres
    </a>
    <a href="./index.php?disc=1" class="disconnect  mx-2 my-3 my-lg-3 display-5 font-weight-bold text-white">
        Déconnexion
    </a>
</span>