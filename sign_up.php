<?php
    session_start();
   /* if (isset ($_SESSION['user'])){
        require './modules/user_checker.php';
        $user = $_SESSION['user'];
        if (checkUserConnection($user["name"],$user["hashedPassword"])) {
            header('Location:index.php');
        } else {
            session_destroy();
            header ('Location:sign_up.php');
        }
     } else {*/
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
        
        </body>

    </html>


<?php
        //}
    


?>

