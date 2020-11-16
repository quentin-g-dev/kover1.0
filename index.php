<?php

session_start();
/*
if ($_SERVER['REQUEST_URI']==='/dwwm/KOVER/kover1.0/'){
    header("Location:./index.php");
}
*/
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
        class="container-fluid full-container d-flex flex-column p-md-5 p-1 mx-auto mt-3 mb-2 w-100 w-lg-75 justify-content-start align-items-baseline h-100 rounded"
        id="koverProj">

        <?php if (!isset($vip)){?>

        <div class="mx-auto">
            <h1 class="text-center text-kover mx-auto my-md-5 my-4 font-weight-bold">Gérez
                efficacement
                vos&nbsp;candidatures
            </h1>
            <div class="row mt-md-5 h-100 ">
                <div class="d-flex  flex-column flex-no-wrap mx-auto col-md-6 my-3 my-md-4 p-md-4">
                    <p class="mx-auto my-3 p-md-2 h3 rounded text-center w-75">
                        Composez vos lettres&nbsp;de&nbsp;motivation en&nbsp;quelques&nbsp;clics
                    </p>
                    <button class="btn bg-kover p-3 h-100 rounded mx-auto mt-4 h1 text-white font-weight-bold"
                        id="startButton" data-toggle="modal" data-target="#srcChoiceModal">
                        COMMENCER
                    </button>
                </div>
                <div
                    class="d-flex flex-column flex-no-wrap col-md-5 border-kover border p-md-4 my-md-5 my-4 w-75 mx-auto">
                    <h2 class="text-center m-auto">Mon Espace</h2>
                    <p class="text-center m-auto mt-4">Retrouvez ici toutes vos lettres&nbsp;de&nbsp;candidature</p>
                    <button type="button"
                        class="btn bg-kover my-5 my-md-3 display-5 font-weight-bold text-white w-75 w-md-50"
                        data-toggle="modal" data-target="#connectModal" id="">
                        Connexion
                    </button>
                    <button type="button"
                        class="btn bg-kover my-3 my-lg-3 display-5 font-weight-bold text-white w-75 w-md-50"
                        data-toggle="modal" data-target="#subscriptionModal" id="">
                        Inscription
                    </button>
                </div>
                <span class="col-md-1">
                </span>
            </div>
        </div>

        <?php } else {
?>
        <div class="h-100 d-flex  flex-column flex-no-wrap m-auto p-md-4">
            <p class="mx-auto my-3 p-md-2 h3 rounded text-center w-75">
                Composez vos lettres&nbsp;de&nbsp;motivation en&nbsp;quelques&nbsp;clics
            </p>
            <button class="btn bg-kover p-3 h-100 rounded mx-auto mt-4 h1 text-white font-weight-bold" id="startButton"
                data-toggle="modal" data-target="#srcChoiceModal">
                COMMENCER
            </button>
        </div>
        <?php
        }
?>
    </main>


    <!-- kover_steps -->
    <?php
        include './php/parts/forms/connection_form.php';
        include './php/parts/forms/subscription_form.php';
        include './php/parts/kover_steps/choice_step.php';
        include './php/parts/kover_steps/letter_template.php';
        include './php/parts/kover_steps/textedit_step.php';
        include './php/parts/kover_steps/selection_step.php';
        include './php/parts/kover_steps/single_render_step.php';

    ?>
    <div id="inputSetter" class="d-none"></div>
    <?php
        include './php/parts/kover_steps/setversions_step.php';
        include './php/parts/kover_steps/final_step.php';
        include './php/parts/allpages_parts/footer.php';
    ?>

    <script src="./assets/js/general.js"></script>
    <!--jsPDF-->
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="./assets/js/View.js"></script>
    <script src="./assets/js/Project.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/nav_menu.js"></script>

    <script src="./assets/js/translations.js"></script>
    <script src="./assets/js/languages.js"></script>
</body>

</html>