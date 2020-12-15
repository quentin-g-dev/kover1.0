<?php

session_start();

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


        <div class="mx-1 mx-sm-auto startView">
            <h1
                class="text-sm-center text-blue mx-sm-auto my-md-5 my-3 font-weight-bold mx-2 display-5 display-md-4 px-2 px-md-0">
                <small>Gérez efficacement vos&nbsp;candidatures</small>
            </h1>
            <div class="row mt-md-5 h-100 mx-sm-auto mx-0 d-flex">
                <div
                    class="d-flex text-dark flex-column justify-content-md-start align-items-md-center flex-no-wrap col-md-6  my-1 my-md-4 p-md-4">
                    <p class="mx-sm-auto text-sm-center mb-1 mb-md-3 mt-3 p-md-2 h5">
                        Composez vos lettres&nbsp;de&nbsp;motivation en&nbsp;quelques&nbsp;clics
                    </p>
                    <button
                        class="btn bg-blue bg-hover-snow p-3 rounded w-75 w-md-50 mt-4 h1 text-snow font-weight-bold mx-sm-auto mx-0"
                        id="startButton" data-toggle="modal" data-target="#srcChoiceModal">

                        <span>COMMENCER</span>
                        <span class="ml-3">
                            <?php include './assets/icons/startarrow.svg'; ?>
                        </span>
                    </button>
                </div>
                <span class="col-md-1">
                </span>
                <div
                    class="bg-marigold rounded d-flex flex-column flex-no-wrap col-md-5  mx-2 border p-3 p-md-4 my-md-5 my-4 w-100 w-sm-75 mx-0 mx-sm-auto text-snow ">
                    <h2 class="m-auto mb-5 text-snow">
                        <span class="mr-1">
                        <?php include "./assets/icons/userprofile.svg"; ?>
                        </span>
                        <span>
                            Mon Espace
                        </span>
                    </h2>
                    <p class="text-center mt-2 mt-md-4">Retrouvez ici toutes vos lettres&nbsp;de&nbsp;candidature</p>
                    <div class="d-flex justify-content-center align-items-center flex-column w-100">
                        <button type="button"
                            class="btn bg-snow text-marigold my-3 my-lg-3 display-5 font-weight-bold w-75 w-md-50"
                            data-toggle="modal" data-target="#connectModal" id="">
                            <span class="mr-3">
                                <?php include "./assets/icons/connectkey.svg"; ?>
                            </span>
                            <span>Connexion</span>
                        </button>
                        <button type="button"
                            class="btn bg-snow text-marigold my-3 my-lg-3 display-5 font-weight-bold w-75 w-md-50"
                            data-toggle="modal" data-target="#subscriptionModal" id="">
                            <span class="mr-3">
                                <?php include "./assets/icons/signup.svg"; ?>
                            </span>
                            <span>Inscription</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <?php } else { ?>
        <div
            class="startView d-flex text-center flex-column justify-content-center align-items-center flex-no-wrap mx-auto col-md-6 my-3 my-md-4 p-md-4">
            <p class="mx-auto my-3 p-md-2 h3 w-100">
                Composez vos lettres&nbsp;de&nbsp;motivation en&nbsp;quelques&nbsp;clics
            </p>
            <button class="btn bg-blue bg-hover-snow p-3  rounded w-75 w-md-50 mt-4 h1 text-snow font-weight-bold"
                id="startButton" data-toggle="modal" data-target="#srcChoiceModal">

                <span>COMMENCER</span>
                <span class="ml-2">
                    <?php include './assets/icons/startarrow.svg'; ?>
                </span>

                <span class="ml-3">

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
        include './php/parts/allpages_parts/cookiesModal.php';
        include './php/parts/allpages_parts/footer.php';
    ?>

    <script src="./assets/js/general.js"></script>
    <!--jsPDF-->
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="./assets/js/View.js"></script>
    <script src="./assets/js/Project.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/nav_menu.js"></script>
    <script id="signInScript" src="./assets/js/sign_in.js"></script>
    <script src="./assets/js/translations.js"></script>
    <script src="./assets/js/languages.js"></script>
    <script src="./assets/js/Cookies.js"></script>



    </html>