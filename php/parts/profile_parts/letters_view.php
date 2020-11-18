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
        <button class="btn btn-light rounded  m-1 m-md-2 h3" id="selectAll" data-status="selectAll">
            <span>
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-list-check mr-2" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                </svg>
            </span>
            <span>Tout Sélectionner</span>
        </button>
        <div class="d-flex align-items-center">
            <span class="text-white font-weight-bold m-1 m-md-2 d-none d-md-flex" for="">Exporter en :</span>
            <button class="btn btn-light rounded d-flex justify-content-center align-items-center m-1 m-md-2 h3"
                id="docExportSelected">
                <span class="mr-2">
                    <img src="./assets/icons/docfile.svg" alt="doc file">
                </span>
                <span>DOC</span>
            </button>
            <button class="btn btn-light rounded d-flex justify-content-center align-items-center m-1 m-md-2 h3"
                id="pdfExportSelected">
                <span class="mr-2">
                    <img src="./assets/icons/pdffile.svg" alt="pdf file">
                </span>
                <span>PDF</span>
            </button>
        </div>
        <button class="btn btn-light rounded m-1 m-md-2 h3 d-flex justify-content-center align-items-center"
            id="deleteSelected">
            <span class="mr-2">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash2-fill" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.037 3.225l1.684 10.104A2 2 0 0 0 5.694 15h4.612a2 2 0 0 0 1.973-1.671l1.684-10.104C13.627 4.224 11.085 5 8 5c-3.086 0-5.627-.776-5.963-1.775z" />
                    <path fill-rule="evenodd"
                        d="M12.9 3c-.18-.14-.497-.307-.974-.466C10.967 2.214 9.58 2 8 2s-2.968.215-3.926.534c-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466zM8 5c3.314 0 6-.895 6-2s-2.686-2-6-2-6 .895-6 2 2.686 2 6 2z" />
                </svg>
            </span>
            <span>Supprimer</span>
        </button>
    </div>


    <div id="lettersList" class="container">
        <div id="listHeader" class="row my-2 text-center">
            <div class="col-1"></div>
            <div class="col-3 cursor-pointer text-kover font-weight-bold" id="orderByTitle">Titre</div>
            <div class="col-3 cursor-pointer text-kover font-weight-bold" id="orderByProject">Projet</div>
            <div class="col-2 cursor-pointer text-kover font-weight-bold" id="orderByDate">Date</div>
            <div class="col-3  cursor-pointer text-kover font-weight-bold"></div>

        </div>

        <?php
            $userLetters = $manager-> selectLetters($vip);
            for ($i=0; $i<sizeOf($userLetters);$i++){
        ?>


        <div id="" class="row my-2 d-flex align-items-center">
            <div class="col-1 d-flex justify-content-center align-items-baseline">
                <input type="checkbox" data-letter="<?=$i?>">
                <input type="hidden" name="" id="reference<?=$i?>" data-letter="<?=$i?>" value="
                    <?=$userLetters[$i]['letter_id']?>">
            </div>
            <div class="col-3 cursor-pointer d-flex justify-content-center align-items-baseline" data-toggle="modal"
                data-target="#detailsLetter<?=$i?>">
                <?=$userLetters[$i]['letter_title']?></div>
            <div class="col-3 cursor-pointer d-flex justify-content-center align-items-baseline">
                <a href="./profile.php?vip=<?=$vip->userId()?>&sect=project&project=<?=$userLetters[$i]['proj_name']?>">
                    <?=$userLetters[$i]['proj_name']?>
                </a>
            </div>
            <div class="col-2 d-flex justify-content-center align-items-baseline">
                <?=$userLetters[$i]['letter_creation']?></div>
            <div class="col-3 d-flex justify-content-center align-items-baseline">
                <button class="deleteButton" aria-hidden="true" data-letter="<?=$i?>">
                    Supprimer
                </button>
                <button class="bg-kover text-white newProjButton" data-letter="<?=$i?>">=> <span>Modèle de
                        projet</span></button>
            </div>

            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg details" id="detailsLetter<?=$i?>" tabindex="-1" role="dialog"
                aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg h-100" role="document">
                    <div class="modal-content h-100">
                        <div class="modal-header d-flex flex-column">
                            <h4 class=" m-auto">Projet : <?=$userLetters[$i]['proj_name']?></h4>
                            <div class="d-flex flex-row align-items-baseline  m-auto">
                                <h5 class="modal-title text-kover" id="" data-letter="<?=$i?>">
                                    <?=$userLetters[$i]['letter_title']?>
                                </h5>
                                <span class="badge badge-secondary mx-2 my-4">Modifier</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-baseline  m-auto">

                                <span class="d-flex flex-row align-items-baseline">
                                    <button aria-label="Copier" class="copyButton" aria-hidden="true"
                                        data-letter="<?=$i?>">
                                        Copier
                                    </button>
                                    <button class="bg-kover text-white docButton" data-letter="<?=$i?>">
                                        DOC
                                    </button>
                                    <button class="pdf bg-kover text-white pdfButton" data-letter="<?=$i?>">
                                        PDF
                                    </button>
                                    <button class="printButton" data-letter="<?=$i?>">
                                        IMPRIMER
                                    </button>
                                </span>
                                <span class="d-flex flex-row align-items-baseline">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="modal-body" id="solidVersion1ModalBody" name="solidVersion1ModalBody"
                            data-letter="<?=$i?>">
                            <?=htmlspecialchars_decode($userLetters[$i]['letter_content'])?>
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