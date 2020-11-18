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

    <div id="groupOptions container"
        class="w-100 my-1 rounded-top textControls bg-blue d-flex justify-content-center align-items-center flex-wrap flex-md-nowrap center mx-auto">
        <button class="bg-snow text-blue bg-hover-blue rounded m-1 m-md-2  d-flex" id="selectAll"
            data-status="selectAll">
            <span id="selectIcon">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-list-check" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                </svg>
            </span>
            <span class="d-none d-sm-flex px-3" id="selectButtonText">Tout Sélectionner</span>
            <span class="d-none" id="unselectIcon">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-list-task" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z" />
                    <path
                        d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z" />
                    <path fill-rule="evenodd"
                        d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z" />
                </svg>
            </span>
            <span class="d-none d-sm-none px-3" id="unselectButtonText">Tout Désélectionner</span>
        </button>
        <div class="d-flex align-items-center">
            <span class="text-white font-weight-bold m-1 m-md-2 d-none d-lg-flex" for="">Exporter en :</span>
            <button
                class="bg-snow text-blue bg-hover-blue rounded d-flex justify-content-center align-items-center m-1 m-md-2 "
                id="docExportSelected">
                <span class="mr-0 mr-sm-2">
                    <img src="./assets/icons/docfile.svg" alt="doc file">
                </span>
                <span class="d-none d-sm-flex">DOC</span>
            </button>
            <button
                class="bg-snow text-blue bg-hover-blue rounded d-flex justify-content-center align-items-center m-1 m-md-2 "
                id="pdfExportSelected">
                <span class="mr-0 mr-sm-2">
                    <img src="./assets/icons/pdffile.svg" alt="pdf file">
                </span>
                <span class="d-none d-sm-flex">PDF</span>
            </button>
        </div>
        <button
            class="bg-snow text-blue bg-hover-blue rounded m-1 m-md-2  d-flex justify-content-center align-items-center"
            id="deleteSelected">
            <span class="mr-0 mr-sm-2">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash2-fill" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.037 3.225l1.684 10.104A2 2 0 0 0 5.694 15h4.612a2 2 0 0 0 1.973-1.671l1.684-10.104C13.627 4.224 11.085 5 8 5c-3.086 0-5.627-.776-5.963-1.775z" />
                    <path fill-rule="evenodd"
                        d="M12.9 3c-.18-.14-.497-.307-.974-.466C10.967 2.214 9.58 2 8 2s-2.968.215-3.926.534c-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466zM8 5c3.314 0 6-.895 6-2s-2.686-2-6-2-6 .895-6 2 2.686 2 6 2z" />
                </svg>
            </span>
            <span class="d-none d-sm-flex">Supprimer</span>
        </button>
    </div>


    <div id="lettersList" class="container p-0">


        <?php
            $userLetters = $manager-> selectLetters($vip);
            for ($i=0; $i<sizeOf($userLetters);$i++){
        ?>
        <div class="d-flex flex-column  align-items-center justify-content-baseline border rounded mt-3 w-100 ">
            <div class="col-12 d-flex justify-content-center align-items-center bg-secondary text-snow w-100">
                <?=$userLetters[$i]['letter_creation']?>
            </div>
            <div id="" class="row my-lg-2 d-flex align-items-center my-0 w-100 p-4 m-auto">

                <div class="col-2  col-md-1 d-flex justify-content-center align-items-baseline">
                    <input type="checkbox" data-letter="<?=$i?>">
                    <input type="hidden" name="" id="reference<?=$i?>" data-letter="<?=$i?>"
                        value=" <?=$userLetters[$i]['letter_id']?>">
                </div>
                <button
                    class="btn col-10 col-md-4 cursor-pointer font-weight-bold p-2 w-auto bg-blue bg-hover-marigold text-snow"
                    data-toggle="modal" data-target="#detailsLetter<?=$i?>">
                    <span class="mr-2">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg>
                    </span>
                    <span><?=$userLetters[$i]['letter_title']?></span>

                </button>
                <div class="col-2 d-md-none"></div>

                <div class="col-10 col-md-3 cursor-pointer text-center mx-auto bg-hover-snow ml-1 rounded p-2">
                    <a
                        href="./profile.php?vip=<?=$vip->userId()?>&sect=project&project=<?=$userLetters[$i]['proj_name']?>">
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
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash2-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.037 3.225l1.684 10.104A2 2 0 0 0 5.694 15h4.612a2 2 0 0 0 1.973-1.671l1.684-10.104C13.627 4.224 11.085 5 8 5c-3.086 0-5.627-.776-5.963-1.775z" />
                                <path fill-rule="evenodd"
                                    d="M12.9 3c-.18-.14-.497-.307-.974-.466C10.967 2.214 9.58 2 8 2s-2.968.215-3.926.534c-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466zM8 5c3.314 0 6-.895 6-2s-2.686-2-6-2-6 .895-6 2 2.686 2 6 2z" />
                            </svg>
                        </span>
                        <span class="d-none d-lg-flex">Supprimer</span>
                    </button>
                    <button
                        class="newProjButton btn bg-marigold text-snow  bg-hover-snow  rounded m-1 m-md-2 d-flex justify-content-center  align-items-center col-5 col-lg-12"
                        id="deleteSelected" data-letter="<?=$i?>">

                        <span class="d-none d-lg-flex">Modèle de projet</span>
                        <span class="ml-0 ml-lg-2">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-box-arrow-right"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                        </span>
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg details bg-blue text-snow" id="detailsLetter<?=$i?>"
                    tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg h-100" role="document">
                        <div class="modal-content h-100">
                            <div class="modal-header d-flex flex-column flex-md-row">
                                <h4 class=" m-auto"><?=$userLetters[$i]['proj_name']?></h4>
                                <div class="d-flex flex-row align-items-baseline  m-auto">
                                    <h5 class="modal-title font-weight-bold" id="" data-letter="<?=$i?>">
                                        <?=$userLetters[$i]['letter_title']?>
                                    </h5>
                                </div>
                                <div class="d-flex justify-content-between align-items-baseline  m-auto">

                                    <span class="btn d-flex flex-row align-items-baseline">
                                        <button aria-label="Copier" class="copyButton btn" aria-hidden="true"
                                            data-letter="<?=$i?>">
                                            Copier
                                        </button>
                                        <button class="btn bg-kover text-white docButton" data-letter="<?=$i?>">
                                            DOC
                                        </button>
                                        <button class="btn pdf bg-kover text-white pdfButton" data-letter="<?=$i?>">
                                            PDF
                                        </button>
                                        <button class="btn printButton" data-letter="<?=$i?>">
                                            IMPRIMER
                                        </button>
                                    </span>
                                    <span class="d-flex flex-row align-items-baseline">
                                        <button type="button" class="close text-snow" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </span>
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
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
<!--Internal JS-->
<script src="./assets/js/general.js"></script>
<script src="./assets/js/user_letters.js"></script>