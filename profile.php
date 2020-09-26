<?php

session_start();
if (!isset ($_GET['vip'])||!isset($_SESSION['user'])){
    header('Location:index.php');
} else {
    $_GET['vip']=htmlspecialchars($_GET['vip']);
    $user = $_SESSION['user'];
    include './modules/db_connect.php';
    require 'modules/user_checker.php';
    include './modules/db_disconnect.php';
    if (!checkUserConnection($user['name'], $user['hashedPassword'])){
        session_destroy();
        header('Location:index.php');
    } else {
        if ($_GET['vip'] !== $user['id']){
            session_destroy();
            header('Location:index.php');
        } else {
            include './modules/db_connect.php';
            require_once './classes/UsersManager.php';
            $manager = new UsersManager($db);
            $currentUser = $manager -> getUserInfo($_GET['vip']);

            $pageTitle = 'Profil de '. $currentUser -> userName();

            include './parts/head.php';
            include './parts/header.php';
?>

            <body>
                <main
            class="container full-container d-flex flex-column p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-around align-items-baseline h-100 rounded"
            id="home">
                    <h2><?echo $currentUser->userName();?></h2>
                    <div class="profile-menu">
                        <a href="profile.php?vip=<?echo $currentUser->userId();?>">
                            Mes informations
                        </a>
                        <a href="profile.php?vip=<?echo $currentUser->userId();?>&sect=letters">
                            Mes lettres
                        </a>
                        <a href="profile.php?vip=<?echo $currentUser->userId();?>&sect=param">
                            Gérer mon compte
                        </a>
                    </div>
                    <div class="profile-content">
                    </div>

                </main>
            </body>

<?php   
            include './modules/db_disconnect.php';
            include './parts/footer.php';


        }
    }

}


?>