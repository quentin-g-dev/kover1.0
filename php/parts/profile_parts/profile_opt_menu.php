<!------------------------------------------------------- SECTION Gérer mon compte : MENU ----------->

<div class="profile-options">
    <a href="profile.php?vip=<?echo $vip->userId();?>&sect=param&opt=change_name">
        <h3>Changer mon nom d'utilisateur</h3>
    </a>
    <a href="profile.php?vip=<?echo $vip->userId();?>&sect=param&opt=change_password">
        <h3>Changer mon mot de passe</h3>
    </a>
</div>