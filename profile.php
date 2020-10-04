<?php

session_start();

/////////////////////////////////////////// VERIFICATION DE SESSION EN COURS EVENTUELLE
include './php/modules/check_vip_session.php';


if (!isset ($_GET['vip'])||!isset($_SESSION["vip"])){
    header('Location:./index.php');
} else {
///////////////////////////////// SI UNE SESSION EST EN COURS ET QU'UN ID EST DEMANDE EN URL
    $_GET['vip']=htmlspecialchars($_GET['vip']);
    include './php/modules/db_connect.php';

    $vip = new User($db);
    $manager = new UsersManager($db);
    $manager->setUserFromSession($vip, $_SESSION['vip']);

    if (!$manager->checkUserConnection($vip)){

////////////////////////////////////  Si l'utilisateur n'est pas connecté, retour à l'accueil 
        session_destroy();        
        header('Location:./index.php');
    } else {

        if ($_GET['vip'] != $vip->userId()){
//////////////// Si l'id demandé ne correspond pas à l'id de la session => redirection accueil
            session_destroy();
            header('Location:./index.php');
        } else {

/////////////////////////////////////////////////////////////////// Affichage de la page Profil 
            
            $pageTitle = 'Profil de '. $vip->userName();
            include './php/parts/allpages_parts/head.php';
            include './php/parts/allpages_parts/header.php';
            include './php/modules/db_disconnect.php';

            if (!isset($_GET['sect'])){ 
////////////////////////////////////// Si aucune section spécifique du profil n'est demandée en URL
                
                if (isset ($_POST['changeNameSubmit']) && isset ($_POST['newName']) && isset ($_POST['confirmPass'])){
////////////////////////////////////////Si le formulaire de changement de nom est envoyé : traitement
                    if(hash('whirlpool', htmlspecialchars($_POST['confirmPass'])) === $vip->userHashedPassword()){
                        if (!$manager->doesUserNameAlreadyExist(htmlspecialchars($_POST['newName']))){
                            require './php/modules/db_connect.php';
                            $vip->setUserName(htmlspecialchars($_POST['newName']));
                            $manager->updateUser($vip);
                            $manager->setUserSession($vip);
                            require './php/modules/db_disconnect.php';
                            echo 'Votre nom d\'utilisateur a été mis à jour !';
                        } else {
                            echo 'Le changement de nom est impossible';
                        }
                    }
                }

                if (isset ($_POST['changePassSubmit']) && isset ($_POST['newPass']) && isset ($_POST['confirmPass'])){
//////////////////////////////Si le formulaire de changement de mot de passe est envoyé : traitement
                    if(hash('whirlpool', htmlspecialchars($_POST['confirmPass'])) === $vip->userHashedPassword()){
                        require './php/modules/db_connect.php';
                        $vip->setUserHashedPassword(hash('whirlpool', htmlspecialchars($_POST['newPass'])));
                        $manager->updateUser($vip);
                        $manager->setUserSession($vip);
                        require './php/modules/db_disconnect.php';
                        echo 'Votre mot de passe a été mis à jour !';
                    } else {
                        echo "Echec du changement de mot de passe";

                    }
                }

               

?>
<main
class="container  full-container d-flex flex-column p-3 mx-auto mt-3 mb-2 text-center  justify-content-around align-items-center h-100 rounded"
id="home">

<!------------------------------------------------------------------------- EN-TÊTE DU PROFIL -->
        <h2><a href="./profile.php?vip=<?php echo $vip->userId();?>"><?echo $vip->userName();?></a></h2>
        <div class="profile-top">
            <div class="border mw-75 mb-5">
                <span>Inscrit(e) depuis le </span> <?php echo $vip->userCreationDate();?>
                <br>
                <span>Statut : </span><?php echo $vip->userStatus();?>
                <span>Langue : </span><?php echo $_SESSION['vip']['langCode'];?>
            </div>
        </div>
<!------------------------------------------------------------------------- MENU DU PROFIL -->

        <div class="profile-menu">
            <a href="./profile.php?vip=<?echo $vip->userId();?>&sect=letters">
                <h3>Mes lettres</h3>
            </a>
            <a href="./profile.php?vip=<?echo $vip->userId();?>&sect=param">
                <h3>Gérer mon compte</h3>
            </a>
        </div>

<?php
            } else {
////////////////////////////////////////////////////////////// Si section spécifique du profil demandée 
                if($_GET['sect'] === 'letters'){  
?>

<!------------------------------------------------------------------------- SECTION Mes lettres -->

                   
<?php 
                } elseif ($_GET['sect']==='param'){
                    if (!isset($_GET['opt'])){
?>
<!------------------------------------------------------- SECTION Gérer mon compte : MENU ----------->

        <div class="profile-options">
            <a href="profile.php?vip=<?echo $vip->userId();?>&sect=param&opt=change_name">
                <h3>Changer mon nom d'utilisateur</h3>
            </a>
            <a href="profile.php?vip=<?echo $vip->userId();?>&sect=param&opt=change_password">
                <h3>Changer mon mot de passe</h3>
            </a>
        </div>

<?php 
                    } else {
                        if ($_GET['opt']==='change_name'){
////////////////////////////////////////////////////////////// Formulaire  Changer le nom d'utilisateur
                            include './php/parts/forms/change_name_form.php';
?>
          

<?php
                        } elseif ($_GET['opt']==='change_password'){
//////////////////////////////////////////////////////////////// Formulaire Changer le mot de passe
                            include './php/parts/forms/change_password_form.php';
                        }
                    }

                } 
            }
?>
                </main>
<?php
                include './php/parts/allpages_parts/footer.php'; 
?>
                <script src="./assets/js/jquery-3.5.1.js"></script>
                <script src="./assets/js/bootstrap.min.js"></script>
                <script src="./assets/js/nav_menu.js"></script>
                <script src="./assets/js/translations.js"></script>
                <script src="./assets/js/languages.js"></script>
            </body>

<?php   
               
            }
        }
    }
?>

