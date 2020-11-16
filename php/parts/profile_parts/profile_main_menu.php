<!------------------------------------------------------------------------- MENU DU PROFIL -->
<main
    class="container-fluid full-container d-flex flex-column p-md-5 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-start align-items-baseline mh-75 rounded">
    <div class="profile-menu m-auto">
        <a href="./profile.php?vip=<?echo $vip->userId();?>&sect=letters">
            <h3>Mes lettres</h3>
        </a>
        <a href="./profile.php?vip=<?echo $vip->userId();?>&sect=param">
            <h3>Gérer mon compte</h3>
        </a>
    </div>
</main>