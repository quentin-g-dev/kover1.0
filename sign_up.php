<?php
    session_start();
    if (isset ($_SESSION['user'])){
        require './modules/user_checker.php';
        $user = $_SESSION['user'];
        if (checkUserConnection($user["name"],$user["hashedPassword"])) {
            header('Location:index.php');
        } else {
            session_destroy();
            header ('Location:sign_up.php');
        }
     } else {
            $pageTitle = 'Kover - Inscription';
            include './parts/head.php';
            include './parts/header.php';
?>

        <body>

<?php
            include './parts/subscription_form.php';
            include './parts/footer.php'; 
?>

            <script src="./js/jquery-3.5.1.js"></script>
            <script src="./js/bootstrap.min.js"></script>
            <script src="./js/sign_up.js"></script>
            <script src="./js/nav_menu.js"></script>
        
        </body>

    </html>


<?php
        }
    


?>

