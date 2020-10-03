<?php

session_start();

/////////////////////////////////////////////////////////////// SI DECONNEXION DEMANDEE
if(isset($_GET['disc']) && isset($_SESSION)){
    $_SESSION=null;
    session_destroy();
}

/////////////////////////////////////////// VERIFICATION DE SESSION EN COURS EVENTUELLE
include './php/modules/check_vip_session.php';

/////////////////////////////////////////////////////////////////// AFFICHAGE DE LA PAGE

$pageTitle = 'Kover';

include './php/parts/allpages_parts/head.php';
include './php/parts/allpages_parts/header.php';

?>

    <body>
        <!-- kover_steps -->
<?php

        include './php/parts/kover_steps/start_step.php';
        include './php/parts/kover_steps/choice_step.php';
        include './php/parts/kover_steps/textedit_step.php';
        include './php/parts/kover_steps/selection_step.php';
        include './php/parts/kover_steps/howmany_step.php';
        include './php/parts/kover_steps/setversions_step.php';
        include './php/parts/kover_steps/final_step.php';

        include './php/parts/allpages_parts/footer.php';

?>

        <!-- jQuery - Bootstrap -->
        <script src="./assets/js/jquery-3.5.1.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>

        <!-- Internal JavaScript -->
        <script src="./assets/js/global.js"></script>
        <script src="./assets/js/nav_menu.js"></script>
        <script src="./assets/js/translations.js"></script>
        <script src="./assets/js/languages.js"></script>
    </body>

</html>