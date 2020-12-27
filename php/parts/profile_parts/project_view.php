<?php
$projName = $_GET['project'];
?>

<main
    class="container-fluid full-container d-flex flex-column p-md-5 mx-auto mt-3 mb-2 w-100 w-lg-75 justify-content-start align-items-baseline mh-75 rounded">
    <div class="w-100 row mx-auto mt-2 mt-md-0">

        <a id="backToVersionsEdit" href="./profile.php?vip=<?=$vip->userId();?>&sect=letters"
            class="btn bg-snow text-dark rounded col-5 d-flex flex-column flex-sm-row justify-content-center align-items-center">
            <span class="mr-2">
                <img src="./assets/icons/backarrow.svg" alt="previous">
            </span>
            <span>Mes Lettres</span>
        </a>
        <span class="col-1 col-sm-2"></span>
        <button href="./profile.php?vip=<?=$vip->userId();?>&sect=letters"
            class="btn bg-snow text-darkred rounded col-5 d-flex flex-column flex-sm-row justify-content-center align-items-center"
            id="deleteProject">
            <span class="mr-3 text-darkred">
                X </span>
            <span>Supprimer ce projet</span>
        </button>
    </div>

    <h1 class="mx-auto my-3"><?=$projName;?></h1>
    <div id="groupOptions container"
        class="w-100 my-1 rounded-top textControls bg-blue d-flex  justify-content-center  align-items-center flex-wrap flex-md-nowrap center mx-auto">
        <button class="bg-snow text-blue bg-hover-blue rounded m-1 m-md-2 p-1 d-flex" id="selectAll"
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
        <button
            class="bg-snow text-blue bg-hover-blue rounded m-1 m-md-2 p-1 d-flex justify-content-center align-items-center"
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

    </div>

    <div id="lettersList" class=" mb-5 mb-md-0 w-100 py-0">

        <?php
        if (!isset($_GET['order'])){
            $letters = $manager->selectProject($vip, $projName, 'letter_title', 'DESC');
        } else {
            $letters = $manager->selectProject($vip, $projName, $_GET['order'], $_GET['way']);
            
        }
            for ($i=0; $i<sizeOf($letters);$i++){
        ?>


        <div
            class="d-flex flex-column  align-items-center justify-content-baseline border border-dark rounded mt-3 w-100 ">
            <div class="col-12 d-flex justify-content-center align-items-center bg-secondary text-snow w-100">
                <?=$letters[$i]['letter_creation']?>
            </div>
            <div id="" class="row  d-flex align-items-center my-0 w-100 p-4 m-auto">

                <div class="col-2  col-md-1 d-flex justify-content-center align-items-baseline">
                    <input type="checkbox" data-letter="<?=$i?>">
                    <input type="hidden" name="" id="reference<?=$i?>" data-letter="<?=$i?>"
                        value=" <?=$letters[$i]['letter_id']?>">
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
                    <span><?=$letters[$i]['letter_title']?></span>

                </button>
                <div class="col-2 d-md-none"></div>

                <div class="col-10 col-md-3 cursor-pointer text-center mx-auto bg-hover-snow ml-1 rounded p-2">
                    <a href="./profile.php?vip=<?=$vip->userId()?>&sect=project&project=<?=$letters[$i]['proj_name']?>">
                        <span><?=$letters[$i]['proj_name']?></span>
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
                        class="newProjButton btn bg-marigold text-snow  bg-hover-snow  rounded m-1 m-md-2 p-1d-flex justify-content-center  align-items-center col-5 col-lg-12"
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
                        <div class="modal-content">
                            <div class="modal-header d-flex flex-column flex-lg-row p-0">
                                <h4 class="my-auto"><?=$letters[$i]['proj_name']?></h4>
                                <div class="d-flex flex-row align-items-center my-auto">
                                    <h5 class="modal-title font-weight-bold" id="" data-letter="<?=$i?>">
                                        <?=$letters[$i]['letter_title']?>
                                    </h5>
                                </div>
                                <div class="d-flex justify-content-between align-items-center ">
                                    <div
                                        class="p-2 d-flex justify-content-start justify-content-sm-between align-items-center bg-blue flex-wrap">
                                        <button
                                            class=" mr-1 pdf pdfButton btn bg-blue text-snow bg-hover-snow d-flex justify-content-center align-items-center"
                                            data-letter="<?=$i?>">
                                            <span class="mr-2"><img src="./assets/icons/pdffile.svg" alt="edit"></span>
                                            <span>PDF</span>
                                        </button>
                                        <button
                                            class="mr-1 btn bg-blue text-snow bg-hover-snow d-flex justify-content-center align-items-center docButton"
                                            data-letter="<?=$i?>">
                                            <span class="mr-2">
                                                <img src="./assets/icons/docfile.svg" alt="edit">
                                            </span>
                                            <span>DOC</span>
                                        </button>
                                        <button data-letter="<?=$i?>"
                                            class=" mr-1 btn bg-blue text-snow bg-hover-snow  d-flex justify-content-center align-items-center  copyButton">
                                            <span>
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                    class="bi bi-clipboard-plus mr-2" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                                    <path fill-rule="evenodd"
                                                        d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zM8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
                                                </svg>
                                            </span>
                                            <span>Copier</span>
                                        </button>
                                        <button
                                            class=" mr-1 printButton btn bg-blue text-snow bg-hover-snow  d-flex justify-content-center align-items-center"
                                            data-letter="<?=$i?>">
                                            <span class="mr-2">
                                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                                    class="bi bi-printer-fill" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z" />
                                                    <path fill-rule="evenodd"
                                                        d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                                    <path fill-rule="evenodd"
                                                        d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                </svg>
                                            </span>
                                            <span>Imprimer</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-body bg-snow text-dark" id="" name="" data-letter="<?=$i?>">
                                <?=htmlspecialchars_decode($letters[$i]['letter_content'])?>
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