<?php
$projName = $_GET['project'];
?>

<main
    class="container-fluid full-container d-flex flex-column p-5 mx-auto mt-3 mb-2 w-100 w-lg-75 justify-content-start align-items-baseline mh-75 rounded">
    <h1 class="m-auto">Mon projet [<?=$projName?>]</h1>
    <a class="m-auto" href="./profile.php?vip=<?=$vip->userId()?>&sect=letters">&larr; Retour</a>
    <a class="m-auto text-danger" id="deleteProject">X Supprimer le projet</a>
    <div id="groupOptions"
        class="w-100 my-2 rounded-top textControls bg-kover d-flex justify-content-center align-items-baseline flex-wrap flex-md-nowrap center mx-auto">
        <button class="btn btn-light rounded  m-2 h3" id="selectAll" data-status="selectAll">
            Tout Sélectionner
        </button>
        <button class="btn btn-light rounded  m-2 h3" id="deleteSelected">
            Supprimer
        </button>
        <span class="text-white font-weight-bold" for="">Exporter en :</span>
        <button class="btn btn-light rounded  m-2 h3" id="docExportSelected">
            DOC
        </button>
        <button class="btn btn-light rounded  m-2 h3" id="pdfExportSelected">
            PDF
        </button>
    </div>

    <div id="lettersList" class="container">
        <div id="listHeader" class="row my-2 text-center">
            <div class="col-1"></div>
            <div class="col-3 cursor-pointer text-kover font-weight-bold">Titre</div>
            <div class="col-3 cursor-pointer text-kover font-weight-bold">Commentaire</div>
            <div class="col-2 cursor-pointer text-kover font-weight-bold">Date</div>
            <div class="col-3  cursor-pointer text-kover font-weight-bold"></div>

        </div>

        <?php
        if (!isset($_GET['order'])){
            $letters = $manager->selectProject($vip, $projName, 'letter_creation', 'DESC');
        } else {
            $letters = $manager->selectProject($vip, $projName, $_GET['order'], $_GET['way']);
            
        }
            for ($i=0; $i<sizeOf($letters);$i++){
        ?>


        <div id="" class="row my-2 d-flex align-items-center">
            <div class="col-1">
                <input type="checkbox" name="" id="">
                <input type="hidden" name="" id="reference<?=$i?>" value="<?=$letters[$i]['letter_id']?>">

            </div>
            <div class="col-3 cursor-pointer" data-toggle="modal" data-target="#detailsLetter<?=$i?>">
                <?=$letters[$i]['letter_title']?>
            </div>
            <div class="col-3"></div>
            <div class="col-2"><?=$letters[$i]['letter_creation']?></div>
            <div class="col-3">
                <button class="bg-kover text-white deleteButton" data-letter="<?=$i?>">Supprimer</button>
            </div>

            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg details" id="detailsLetter<?=$i?>" tabindex="-1" role="dialog"
                aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg h-100" role="document">
                    <div class="modal-content h-100">
                        <div class="modal-header d-flex flex-column">
                            <h4 class=" m-auto">Projet : <span id="projName"><?=$letters[$i]['proj_name']?></span></h4>
                            <div class="d-flex flex-row align-items-baseline  m-auto">
                                <h5 class="modal-title text-kover" id="" data-letter="<?=$i?>">
                                    <?=$letters[$i]['letter_title']?>
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
                            <?=$letters[$i]['letter_content']?>
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
<script src="./assets/js/delete_project.js"></script>