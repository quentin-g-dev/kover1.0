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

                include './php/parts/profile_parts/profile_head.php';
                include './php/parts/profile_parts/profile_main_menu.php';


            } else {
////////////////////////////////////////////////////////////// Si section spécifique du profil demandée 
                if($_GET['sect'] === 'letters'){  
                    require './php/modules/db_connect.php';


                    //SECTION Mes lettres
                    include './php/parts/profile_parts/letters_view.php';
                   
                } elseif($_GET['sect']==='project'){
                    if(isset($_GET['project'])){
                        if ($manager->doesProjectExist($vip, $_GET['project'])){
                            include './php/parts/profile_parts/project_view.php';
                        } else {
                            header('Location:./profile.php?vip='.$vip->userId().'&sect=letters');
                        }
                    }
                
                }elseif ($_GET['sect']==='param'){
                    if (!isset($_GET['opt'])){

                        include './php/parts/profile_parts/profile_opt_menu.php';
 
                    } else {
                        if ($_GET['opt']==='change_name'){
////////////////////////////////////////////////////////////// Formulaire  Changer le nom d'utilisateur
                            include './php/parts/forms/change_name_form.php';

                        } elseif ($_GET['opt']==='change_password'){
//////////////////////////////////////////////////////////////// Formulaire Changer le mot de passe
                            include './php/parts/forms/change_password_form.php';
                        } elseif ($_GET['opt']==='delete_account'){
//////////////////////////////////////////////////////////////// Suppression du compte
                            include './php/parts/forms/delete_account.php';
                        }
                    }

                } 
                require './php/modules/db_disconnect.php';

            }
?>
</main>
<?php
                include './php/parts/allpages_parts/footer.php'; 
?>
<script src="./assets/js/jquery-3.5.1.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/general.js"></script>
<script src="./assets/js/nav_menu.js"></script>
<script src="./assets/js/translations.js"></script>
<script src="./assets/js/languages.js"></script>
</body>

<?php   
               
            }
        }
    }
?>