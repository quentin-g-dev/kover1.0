<div id="singleRender" class="d-none">
    <div class="d-flex flex-column justify-content-center bg-snow align-items-center">

        <div class="d-flex align-items-center justify-content-center mb-2 letterNameBlock" data-version="1">
            <input type="text" data-version="1" class="d-none letterNameEditor">
            <h5 class="display-5 ml-3" id="heading0" data-version="1">
            </h5>
            <button class="badge  bg-snow mx-2 my-4 letterNameBadge" data-version="1">
                <span><img src="./assets/icons/editor.svg" alt="edit"></span>
            </button>
        </div>

        <div id="versionsGroup"
            class="w-100 my-1 rounded-top textControls d-flex justify-content-center align-items-center flex-wrap flex-md-nowrap center mx-auto">
            <input type="checkbox" checked class="d-none">
            <div class="version" id="accordion">
                <div class="solidVersion d-flex justify-content-between align-items-center bg-blue rounded mb-2"
                    id="solidVersion1">
                    <div class="d-flex align-items-center">
                        <button
                            class="bg-snow text-blue bg-hover-blue rounded d-flex justify-content-center align-items-center m-1 m-md-2 "
                            id="saveSelected">
                            <span class="mr-0 mr-sm-2">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cloud-plus"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                    <path fill-rule="evenodd"
                                        d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </span>
                            <span class="d-none d-sm-flex">Sauvegarder</span>
                        </button>
                        <button
                            class="copyButton bg-snow text-blue bg-hover-blue rounded d-flex justify-content-center align-items-center m-1 m-md-2 "
                            id="" data-copy="0">
                            <span class="mr-0 mr-sm-2">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-clipboard"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path fill-rule="evenodd"
                                        d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                            </span>
                            <span class="d-none d-sm-flex">Copier</span>
                        </button>
                        <span class="text-white font-weight-bold m-1 m-md-2 d-none d-lg-flex" for="">Exporter en
                            :</span>
                        <a href=""
                            class="bg-snow text-blue bg-hover-blue rounded d-flex justify-content-center align-items-center m-1 m-md-2 "
                            id="solidOriginalDocLink">
                            <span class="mr-0 mr-sm-2">
                                <img src="./assets/icons/docfile.svg" alt="doc file">
                            </span>
                            <span class="d-none d-sm-flex">DOC</span>
                        </a>
                        <button
                            class="pdf bg-snow text-blue bg-hover-blue rounded d-flex justify-content-center align-items-center m-1 m-md-2 "
                            id="">
                            <span class="mr-0 mr-sm-2">
                                <img src="./assets/icons/pdffile.svg" alt="pdf file">
                            </span>
                            <span class="d-none d-sm-flex">PDF</span>
                        </button>
                    </div>
                    <button
                        class="print bg-snow text-blue bg-hover-blue rounded m-1 m-md-2  d-flex justify-content-center align-items-center"
                        id="" data-print="0">
                        <span class="mr-0 mr-sm-2">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-printer-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z" />
                                <path fill-rule="evenodd"
                                    d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                <path fill-rule="evenodd"
                                    d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                            </svg>
                        </span>
                        <span class="d-none d-sm-flex">Imprimer</span>
                    </button>

                </div>
                <div class="version-body body bg-snow text-dark border border-blue px-1 px-md-3" data-content="0"
                    id="solidVersion1ModalBody"></div>

            </div>
        </div>




        <!-- Modal for Connected Users who successed registering a project -->
        <button id="registerSuccess" class="d-none" data-toggle="modal" data-target="#registerSuccessModal"></button>
        <div class="modal fade modal-lg" id="registerSuccessModal" tabindex="-1" role="dialog"
            aria-labelledby="registerSuccessModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-kover" id="registerSuccessModalTitle">
                            Votre projet a bien été enregistré.
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="registerSuccessModalBody" name="registerSuccessModalBody">
                        Vous pouvez consulter tous vos projets dans <a
                            href="./profile.php?vip=<?= $_SESSION['vip']['userId'];?>">votre
                            espace personnel</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>