<?php

session_start();
if ($_SERVER['REQUEST_URI']==='/dwwm/KOVER/kover1.0/'){
    header("Location:./index.php");
}
/////////////////////////////////////////////////////////////// SI DECONNEXION DEMANDEE
if(isset($_GET['disc']) && isset($_SESSION)){
    $_SESSION=null;
    session_destroy();
    header("Location:./index.php");
}


/////////////////////////////////////////// VERIFICATION DE SESSION EN COURS EVENTUELLE
include './php/modules/check_vip_session.php';

/////////////////////////////////////////////////////////////////// AFFICHAGE DE LA PAGE

$pageTitle = 'Kover';

include './php/parts/allpages_parts/head.php';
include './php/parts/allpages_parts/header.php';

?>

<body>
    <?php if(isset($_SESSION['template'])){?>
    <div class="d-none" id="userTemplate">
        <?php echo $_SESSION['template']; $_SESSION['template']=null;?>
    </div>
    <?php }?>

    <main
        class="container-fluid full-container d-flex flex-column p-5 mx-auto mt-3 mb-2 w-100 w-lg-75 justify-content-start align-items-baseline h-100 rounded"
        id="koverProj">
    </main>
    <!-- kover_steps -->
    <?php
        include './php/parts/kover_steps/start_step.php';
        include './php/parts/kover_steps/choice_step.php';
        include './php/parts/kover_steps/letter_template.php';
        include './php/parts/kover_steps/textedit_step.php';
        include './php/parts/kover_steps/selection_step.php';
    ?>
    <div id="inputSetter" class="d-none"></div>
    <?php
        include './php/parts/kover_steps/setversions_step.php';
        include './php/parts/kover_steps/final_step.php';
        include './php/parts/allpages_parts/footer.php';
    ?>




</body>

</html>