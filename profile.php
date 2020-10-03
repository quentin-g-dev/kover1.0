<?php
    session_start();
    
    
    $user = $_SESSION["user"];

    if (!isset ($_GET['vip'])||!isset($_SESSION["vip"])){
        header('Location:index.php');
    } else {

        $_GET['vip']=htmlspecialchars($_GET['vip']);
        $user = $_SESSION['user'];
        include './modules/db_connect.php';
        require './classes/User.php';
        require './classes/UsersManager.php';
        $currentUser = new User($db);
        $currentUser->setUserName($user['name']);
        $manager = new UsersManager($db);
        $manager ->hydrateUser($currentUser);
        if (!$manager->isUserConnected($currentUser)){

        // Si l'utilisateur n'est pas connecté, retour à l'accueil 
            session_destroy();        
            header('Location:index.php');
        } else {
            if ($_GET['vip'] !== $currentUser->userId()){

                // Si l'id du profil à afficher ne correspond pas à l'id stocké en session. 
                session_destroy();
                header('Location:index.php');
            } else {

// Préparation de la page Profil //////////////////////////////////////////////////////////
                include './modules/db_connect.php';
                
                $pageTitle = 'Profil de '. $currentUser->userName();
                include './php/parts/allpages_parts/head.php';
                include './php/parts/allpages_parts/header.php';
                //include './modules/db_disconnect.php';

?>

<body>
    <main
class="container  full-container d-flex flex-column p-3 mx-auto mt-3 mb-2 text-center  justify-content-around align-items-center h-100 rounded"
id="home">
        <h2><a href="./profile.php?vip=<?php echo $currentUser->userId();?>"><?echo $currentUser->userId();?></a></h2>
        <div class="profile-top">
            <div class="border mw-75 mb-5">
            Inscrit(e) depuis le <?php echo $currentUser->userCreationDate();?>
            <br>
            Statut : <?php echo $currentUser->userStatus();?>
            </div>
        </div>

<?php
                    if (!isset($_GET['sect'])){ 

///Traitement du formulaire de changement de nom //////////////////////////////////////////
                        if (isset ($_POST['changeNameSubmit']) && isset ($_POST['newName']) && isset ($_POST['confirmPass'])){
                            if(hash('whirlpool', htmlspecialchars($_POST['confirmPass'])) === $currentUser->userHashedPassword()){
                                require './modules/db_connect.php';
                                $currentUser->setUserName(htmlspecialchars($_POST['newName']));
                                $manager->updateUser($currentUser);
                            }
                        }
                    /* ACCUEIL DU PROFIL */
?>
        <div class="profile-menu">
            <a href="profile.php?vip=<?echo $currentUser['userId'];?>&sect=letters">
                <h3>Mes lettres</h3>
            </a>
            <a href="profile.php?vip=<?echo $currentUser['userId'];?>&sect=param">
                <h3>Gérer mon compte</h3>
            </a>
        </div>

<?php
                        } else {
                        if($_GET['sect'] === 'letters'){  

                        /* MES LETTRES */
?>
                   

<?php 
                        } elseif ($_GET['sect']==='param'){

                        // GERER MON COMPTE 
                            if (!isset($_GET['opt'])){

                            // Gérer mon compte : affichage du sous-menu 

?>
                            
        <div class="profile-options">
            <a href="profile.php?vip=<?echo $currentUser['userId'];?>&sect=param&opt=change_name">
                <h3>Changer mon nom d'utilisateur</h3>
            </a>
            <a href="profile.php?vip=<?echo $currentUser['userId'];?>&sect=param&opt=change_password">
                <h3>Changer mon mot de passe</h3>
            </a>
        </div>

<?php 
                    } else {
                        if ($_GET['opt']==='change_name'){
                            
                            /* Changer le nom d'utilisateur */
                            include './parts/forms/change_name_form.php';
?>
          

<?php
                       } elseif ($_GET['opt']==='change_password'){

                            // Changer le mot de passe 


                        }
                    }

?>


                    </div>
<?php
                } 
?>
                </main>
<?php
                include './parts/footer.php'; 
?>
                <script src="./assets/js/jquery-3.5.1.js"></script>
                <script src="./assets/js/bootstrap.min.js"></script>
                <script src="./assets/js/nav_menu.js"></script>
            </body>

<?php   
                include './modules/db_disconnect.php';
                
                
               }
            }
        }
    }
?>

