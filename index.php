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

        <div class="mx-3 mx-sm-auto">
            <h1 class="text-sm-center text-kover mx-sm-auto my-md-5 my-4 font-weight-bold mx-2">
                Gérez efficacement vos&nbsp;candidatures
            </h1>
            <div class="row mt-md-5 h-100 mx-sm-auto mx-0 d-flex">
                <div
                    class="d-flex  flex-column justify-content-md-center align-items-md-center flex-no-wrap col-md-6 my-3 my-md-4 p-md-4">
                    <p class="mx-sm-auto text-sm-center my-3 p-md-2 h3">
                        Composez vos lettres&nbsp;de&nbsp;motivation en&nbsp;quelques&nbsp;clics
                    </p>
                    <button
                        class="btn bg-blue p-3 rounded w-75 w-md-50 mt-4 h1 text-snow font-weight-bold mx-sm-auto mx-0"
                        id="startButton" data-toggle="modal" data-target="#srcChoiceModal">

                        <span>COMMENCER</span>
                        <span class="ml-3">
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-right-square"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div
                    class="bg-marigold text-kover d-flex flex-column flex-no-wrap col-md-5  border p-3 p-md-4 my-md-5 my-4 w-75 mx-0 mx-sm-auto ">
                    <h2 class="text-center m-auto mb-5">
                        <span class="mr-1">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-briefcase-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z" />
                                <path fill-rule="evenodd"
                                    d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5v1.384l-7.614 2.03a1.5 1.5 0 0 1-.772 0L0 5.884V4.5zm5-2A1.5 1.5 0 0 1 6.5 1h3A1.5 1.5 0 0 1 11 2.5V3h-1v-.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V3H5v-.5z" />
                            </svg>
                        </span>
                        <span>
                            Mon Espace
                        </span>
                    </h2>
                    <p class="text-center m-auto mt-4">Retrouvez ici toutes vos lettres&nbsp;de&nbsp;candidature</p>
                    <div class="d-flex justify-content-center align-items-center flex-column w-100">

                        <button type="button"
                            class="btn bg-blue my-5 my-md-3 display-5 font-weight-bold text-snow w-75 w-md-50"
                            data-toggle="modal" data-target="#connectModal" id="">
                            <span class="mr-3">
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-key-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg>
                            </span>
                            <span>Connexion</span>

                        </button>
                        <button type="button"
                            class="btn bg-blue my-3 my-lg-3 display-5 font-weight-bold text-snow w-75 w-md-50"
                            data-toggle="modal" data-target="#subscriptionModal" id="">
                            <span class="mr-3"><svg width="2em" height="2em" viewBox="0 0 16 16"
                                    class="bi bi-person-plus-fill" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </span>
                            <span>Inscription</span>
                        </button>
                    </div>
                </div>
                <span class="col-md-1">
                </span>
            </div>
        </div>

        <?php } else {
?>
        <div class="d-flex  flex-column flex-no-wrap mx-auto col-md-6 my-3 my-md-4 p-md-4">
            <p class="mx-auto my-3 p-md-2 h3 w-100">
                Composez vos lettres&nbsp;de&nbsp;motivation en&nbsp;quelques&nbsp;clics
            </p>
            <button class="btn bg-blue p-3  rounded w-75 w-md-50 mt-4 h1 text-snow font-weight-bold" id="startButton"
                data-toggle="modal" data-target="#srcChoiceModal">

                <span>COMMENCER</span>
                <span class="ml-3">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-right-square"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path fill-rule="evenodd"
                            d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z" />
                    </svg>
                </span>
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