<!------------------------------------------------------- SECTION Gérer mon compte : MENU ----------->
<main
    class="container-fluid full-container d-flex flex-column p-5 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-start align-items-baseline h-100 rounded">
    <div class="profile-options m-auto">
        <a href="profile.php?vip=<?echo $vip->userId();?>&sect=param&opt=change_name">
            <h3>Changer mon nom d'utilisateur</h3>
        </a>
        <a href="profile.php?vip=<?echo $vip->userId();?>&sect=param&opt=change_password">
            <h3>Changer mon mot de passe</h3>
        </a>
        <a href="profile.php?vip=<?echo $vip->userId();?>&sect=param&opt=delete_account" onclick="confirm">
            <p>Supprimer mon compte</p>
        </a>
    </div>
</main