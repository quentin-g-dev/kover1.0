<main
    class="container  full-container d-flex flex-column p-md-3 mx-auto mt-3 mb-2 text-center  justify-content-around align-items-center h-100 rounded"
    id="home">

    <!------------------------------------------------------------------------- EN-TÊTE DU PROFIL -->
    <h2><a href="./profile.php?vip=<?= $vip->userId(); ?>">
            <?= $vip->userName(); ?>
        </a></h2>
    <div class="profile-top">
        <div class="border mw-75 mb-5">
            <div><span>Inscrit(e) depuis le </span><span><?= $vip->userCreationDate();?></span></div>
            <div><span>Langue : </span><span id="userLang"><?= $vip->userLangCode();?></span></div>
        </div>
    </div>