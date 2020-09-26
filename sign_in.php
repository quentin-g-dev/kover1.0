<?php
session_start();
require './modules/user_checker.php';

if (isset($_POST['signInSubmit'])&& isset($_POST['signInName']) && isset($_POST['signInPass'])){
    
    if (checkUserConnection(htmlspecialchars($_POST['signInName']), hash('whirlpool', htmlspecialchars($_POST['signInPass'])))){
        require './modules/user_session.php';
        setUserSession($_POST['signInName'],$_POST['signInPass']);
        header ("Location:profile.php");
    } else {
        session_destroy();
        header ("Location:profile.php");
    }
} 

if (isset ($_SESSION['user'])){
    $user = $_SESSION['user'];
    if (checkUserConnection($user['name'], $user['hashedPassword'])){
        header ('Location:index.php');
    } else {
        session_destroy();
        header ('Location:sign_in.php');
    }
} else {

$pageTitle = 'Kover - Connexion';

include './parts/head.php';

include './parts/header.php';

include './parts/connection_form.php';

include './parts/footer.php'; 

?>

<script src="./js/jquery-3.5.1.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/sign_in.js"></script>
<script src="./js/nav_menu.js"></script>
        
</body>

</html>
<?
}?>



