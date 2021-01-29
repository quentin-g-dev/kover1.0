<main
    class="container-fluid full-container d-flex flex-column p-md-5 p-1 mx-auto mt-3 mb-2 w-100 w-lg-75 justify-content-start align-items-baseline mh-75 rounded">
    <h1 class="m-auto">Mes Lettres</h1>
    <p class="text-center m-auto">
        <?php
        if( $manager-> countLetters($vip)===0){
            echo '<span>Aucune lettre enregistrée</span>';
        } else if( $manager-> countLetters($vip)===1){
            echo '1 <span>lettre enregistrée</span>';
        } else if( $manager-> countLetters($vip)>1){
            echo ''.$manager-> countLetters($vip).' <span>lettres enregistrées</span></p>';
        } 
        ?>
    </p>

    <!-- Alert Message if no letter selected-->
    <div class="alert bg-darkred text-snow mx-auto alert-dismissible fade d-none w-100" role="alert"
        id="emptySelectionAlert">
        <strong>Aucune lettre sélectionnée !</strong>
        <button type="button" class="close text-snow" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div id="groupOptions"
        class="w-100 my-1 rounded-top textControls bg-blue d-flex  justify-content-center align-items-center flex-wrap flex-md-nowrap center mx-auto">
        <button class="bg-snow text-blue bg-hover-blue rounded m-1 m-md-2 p-1 d-flex" id="selectAll"
            data-status="selectAll">
            <span id="selectIcon">
                <img src="./assets/icons/listcheck.svg" alt="all">                           
            </span>
            <span class="d-none d-sm-flex px-3" id="selectButtonText">Tout Sélectionner</span>
            <span class="d-none" id="unselectIcon">
                <img src="./assets/icons/listtask.svg" alt="none">                           
            </span>
            <span class="d-none d-sm-none px-3" id="unselectButtonText">Tout Désélectionner</span>
        </button>
        <div class="d-flex align-items-center">
            <span class="text-white font-weight-bold m-1 m-md-2 p-1 d-none d-lg-flex" for="">Exporter en :</span>
            <button
                class="bg-snow text-blue bg-hover-blue rounded d-flex justify-content-center align-items-center m-1 m-md-2 p-1"
                id="docExportSelected">
                <span class="mr-0 mr-sm-2">
                    <img src="./assets/icons/docfile.svg" alt="doc file">
                </span>
                <span class="d-none d-sm-flex">DOC</span>
            </button>
            <button
                class="bg-snow text-blue bg-hover-blue rounded d-flex justify-content-center align-items-center m-1 m-md-2 p-1"
                id="pdfExportSelected">
                <span class="mr-0 mr-sm-2">
                    <img src="./assets/icons/pdffile.svg" alt="pdf file">
                </span>
                <span class="d-none d-sm-flex">PDF</span>
            </button>
        </div>
        <button
            class="bg-snow text-blue bg-hover-blue rounded m-1 m-md-2 p-1 d-flex justify-content-center align-items-center"
            id="deleteSelected">
            <span class="mr-0 mr-sm-2">
                <img src="./assets/icons/trash.svg" alt="trash">                           
            </span>
            <span class="d-none d-sm-flex">Supprimer</span>
        </button>
    </div>


    <div id="lettersList" class="container p-0">


        <?php
            $userLetters = $manager-> selectLetters($vip);
            for ($i=0; $i<sizeOf($userLetters);$i++){
        ?>
        <div
            class="d-flex flex-column  align-items-center justify-content-baseline border border-dark rounded mt-3 w-100 ">
            <div class="col-12 d-flex justify-content-center align-items-center bg-secondary text-snow w-100">
                <?=$userLetters[$i]['letter_creation']?>
            </div>
            <div id="" class="row  d-flex align-items-center my-0 w-100 p-4 m-auto">

                <div class="col-2  col-md-1 d-flex justify-content-center align-items-baseline">
                    <input type="checkbox" data-letter="<?=$i?>">
                    <input type="hidden" name="" id="reference<?=$i?>" data-letter="<?=$i?>"
                        value=" <?=$userLetters[$i]['letter_id']?>">
                </div>
                <button
                    class="btn col-10 col-md-4 cursor-pointer font-weight-bold p-2 w-auto bg-blue bg-hover-marigold text-snow"
                    data-toggle="modal" data-target="#detailsLetter<?=$i?>">
                    <span class="mr-2">
                        <img src="./assets/icons/eye.svg" alt="trash">                           
                    </span>
                    <span><?=$userLetters[$i]['letter_title']?></span>
                </button>
                <div class="col-2 d-md-none"></div>

                <div class="col-10 col-md-3 cursor-pointer text-center mx-auto bg-hover-snow ml-1 rounded p-2">
                    <a href="./profile.php?vip=<?=$vip->userId()?>&sect=project&project=<?=$userLetters[$i]['proj_name']?>">
                        <span><?=$userLetters[$i]['proj_name']?></span>
                    </a>
                </div>
                <div class="col-2 d-md-none"></div>
                <div
                    class="col-10 col-md-3 d-md-flex justify-content-md-between p-1 align-items-baseline row w-100 mx-auto">
                    <button
                        class="btn deleteButton bg-marigold text-snow  bg-hover-snow rounded m-1 d-flex justify-content-center align-items-center col-5 col-lg-12"
                        id="" data-letter="<?=$i?>">
                        <span class="mr-0 mr-lg-2">
                            <img src="./assets/icons/trash.svg" alt="trash">                           
                        </span>
                        <span class="d-none d-lg-flex">Supprimer</span>
                    </button>
                    <button
                        class="newProjButton btn bg-marigold text-snow  bg-hover-snow  rounded m-1 m-md-2 p-1 d-flex justify-content-center  align-items-center col-5 col-lg-12"
                        id="deleteSelected" data-letter="<?=$i?>">
                        <span class="d-none d-lg-flex">Modèle de projet</span>
                        <span class="ml-0 ml-lg-2">
                            <img src="./assets/icons/clipboard.svg" alt="go">                           
                        </span>
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg details bg-blue text-snow" id="detailsLetter<?=$i?>"
                    tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg h-100" role="document">
                        <div class="modal-content">
                            <div class="modal-header d-flex flex-column flex-lg-row p-0">
                                <h4 class="my-auto"><?=$userLetters[$i]['proj_name']?></h4>
                                <div class="d-flex flex-row align-items-center my-auto">
                                    <h5 class="modal-title font-weight-bold" id="" data-letter="<?=$i?>">
                                        <?=$userLetters[$i]['letter_title']?>
                                    </h5>
                                </div>
                                <div class="d-flex justify-content-between align-items-center ">
                                    <div
                                        class="p-2 d-flex justify-content-start justify-content-sm-between align-items-center bg-blue flex-wrap">
                                        <button
                                            class=" mr-1 pdf pdfButton btn bg-blue text-snow bg-hover-snow d-flex justify-content-center align-items-center"
                                            data-letter="<?=$i?>">
                                            <span class="mr-2"><img src="./assets/icons/pdffile.svg" alt="pdf"></span>
                                            <span>PDF</span>
                                        </button>
                                        <button
                                            class="mr-1 btn bg-blue text-snow bg-hover-snow d-flex justify-content-center align-items-center docButton"
                                            data-letter="<?=$i?>">
                                            <span class="mr-2">
                                                <img src="./assets/icons/docfile.svg" alt="doc">
                                            </span>
                                            <span>DOC</span>
                                        </button>
                                        <button data-letter="<?=$i?>"
                                            class=" mr-1 btn bg-blue text-snow bg-hover-snow  d-flex justify-content-center align-items-center  copyButton">
                                            <span>
                                                <img src="./assets/icons/clipboard.svg" alt="clipboard">
                                            </span>
                                            <span>Copier</span>
                                        </button>
                                        <button
                                            class=" mr-1 printButton btn bg-blue text-snow bg-hover-snow  d-flex justify-content-center align-items-center"
                                            data-letter="<?=$i?>">
                                                <img src="./assets/icons/print.svg" alt="print">
                                            <span>Imprimer</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-body bg-snow text-dark" id="" name="" data-letter="<?=$i?>">
                                <?=htmlspecialchars_decode($userLetters[$i]['letter_content'])?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
                
            }
        ?>

    </div>

</main>
<!--jsPDF-->
<script src="./assets/js/jspdf.umd.min.js"></script>
<!--Internal JS-->
<script src="./assets/js/general.js"></script>
<script src="./assets/js/user_letters.js"></script>