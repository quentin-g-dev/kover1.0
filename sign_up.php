<?php
    session_start();

/////////////////////////////////////////// VERIFICATION DE SESSION EN COURS EVENTUELLE
include './php/modules/check_vip_session.php';

/////////////////////////////////////////// REDIRECTION VERS INDEX.PHP SI SESSION EN COURS
if (isset ($vip)){
    header ('Location:./index.php');
} else {
    
    $pageTitle = 'Kover - Inscription';
    include './php/parts/allpages_parts/head.php';
    include './php/parts/allpages_parts/header.php';
?>

    <body>

<?php
    include './php/parts/forms/subscription_form.php';
    include './php/parts/allpages_parts/footer.php';
?>

        <script src="./assets/js/jquery-3.5.1.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/sign_up.js"></script>
        <script src="./assets/js/nav_menu.js"></script>
        <script src="./assets/js/translations.js"></script>
        <script src="./assets/js/languages.js"></script>
        
    </body>

</html>


<?php
    }



?>

