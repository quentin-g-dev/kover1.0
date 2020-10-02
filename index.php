<?php
session_start();

if(isset($_GET['disc']) && isset($_SESSION)){
    $_SESSION=[];
    session_destroy();
}

$pageTitle = 'Kover - Accueil';

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
    </body>

</html>