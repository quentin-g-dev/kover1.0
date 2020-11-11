<main
    class="container  full-container d-flex flex-column p-3 mx-auto mt-3 mb-2 text-center  justify-content-around align-items-center h-100 rounded"
    id="home">

    <!------------------------------------------------------------------------- EN-TÊTE DU PROFIL -->
    <h2><a href="./profile.php?vip=<?php echo $vip->userId();?>">
            <?echo $vip->userName();?>
        </a></h2>
    <div class="profile-top">
        <div class="border mw-75 mb-5">
            <div>Inscrit(e) depuis le <span><?= $vip->userCreationDate();?></span></div>
            <div>Langue : <span><?= $vip->userLangCode();?></span></div>
        </div>
    </div>