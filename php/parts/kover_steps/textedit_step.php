<!--TEXTAREA-->
<div id="textEdition" class="d-none">
    <div class="px-2 px-md-1">
        <!--Input Nom du projet-->
        <div class="d-flex align-items-center justify-content-center mx-auto" id="ProjNameBlock">
            <input type="text" name="" id="projNameEditor" class="d-none">
            <h5 class="display-5 ml-3" id="projName"></h5>
            <button class="badge bg-snow mx-2 my-4" id="projNameBadge">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                </svg>
            </button>
        </div>
        <!--Outils d'édition de texte-->

        <div
            class="w-100 rounded-top textControls bg-blue  d-flex justify-content-sm-center align-items-center flex-wrap center mx-auto mt-md-3">
            <div class="m-1 m-md-2 d-flex justify-content-sm-center align-items-center flex-wrap">
                <button id="left" class="controlButton btn-light">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-text-left" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
                <button id="center" class="controlButton btn-light">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-text-center" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
                <button id="right" class="controlButton btn-light">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-text-right" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
                <button id="justify" class="controlButton btn-light">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-justify" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
            </div>
            <span class="p-1 p-md-2 m-1 m-md-2">
                <select name="fontFamily" id="fontFamily">
                    <option id="raleway" value="Raleway" class="controlButton" selected>Raleway</option>
                    <option id="playfairDisplay" value="Playfair Display" class="controlButton">Playfair Display
                    </option>
                    <option id="josefinSans" value="Josefin Sans" class="controlButton">Josefin Sans</option>
                    <option id="crimsonPro" value="Crimson Pro" class="controlButton">Crimson Pro</option>
                    <option id="workSans" value="Work Sans" class="controlButton">Work Sans</option>
                    <option id="jost" value="Jost" class="controlButton">Jost</option>
                    <option id="piazzolla" value="Piazzolla" class="controlButton">Piazzolla</option>
                </select>
            </span>
            <span class="p-1 p-md-2 m-1 m-md-2">
                <select name="fontSize" id="fontSize">
                    <option value="10" id="fz10" class="controlButton">10</option>
                    <option value="11" id="fz11" class="controlButton">11</option>
                    <option value="12" id="fz12" selected class="controlButton">12</option>
                    <option value="13" id="fz13" class="controlButton">13</option>
                    <option value="14" id="fz14" class="controlButton">14</option>
                    <option value="16" id="fz16" class="controlButton">16</option>
                    <option value="18" id="fz18" class="controlButton">18</option>
                    <option value="20" id="fz20" class="controlButton">22</option>
                </select>
            </span>
            <div class="m-1 m-md-2 d-flex justify-content-center align-items-center flex-wrap">
                <span class="p-1 p-md-2">
                    <button id="bold" class="controlButton btn-light"><span class="font-weight-bold">G</span></button>
                </span>
                <span class="p-1 p-md-2 ">
                    <button id="italic" class="controlButton btn-light"><span class="font-italic">I</span></button>
                </span>
                <span class="p-1 p-md-2">
                    <button id="underline" class="controlButton btn-light"><span
                            class="font-weight-bold"><u>S</u></span></button>
                </span>
            </div>
            <button class="btn bg-snow rounded d-flex justify-content-center align-items-center m-1 m-md-2 h3"
                id="pasteText">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clipboard mr-2" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                    <path fill-rule="evenodd"
                        d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                </svg>
                <small>COLLER</small>
            </button>
        </div>
        <!--Champ de texte et validation-->
        <div class="bg-snow w-100 mx-auto my-0 text-left rounded-bottom border" contenteditable="true" id="userText">
        </div>

        <button
            class="btn bg-blue w-100 rounded mx-auto mt-4 d-flex justify-content-center align-items-center text-snow font-weight-bold bg-hover-snow"
            id="submitText" data-toggle="modal" data-target="#singleOrMultiple">
            OK
        </button>
        <div class="modal fade" id="singleOrMultiple" tabindex="-1" role="dialog"
            aria-labelledby="singleOrMultipleTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body" id="singleOrMultipleModalBody" name="singleOrMultipleModalBody">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                        <button
                            class="d-flex flex-column flex-sm-row justify-content-start align-items-center srcChoice btn bg-blue text-snow bg-hover-snow  font-weight-bold rounded mx-auto mx-md-5 mt-4 p-2 p-md-5 mb-2 w-75 w-md-50"
                            id="single">
                            <span class="mr-3">
                                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-file-earmark"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                                    <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                                </svg>
                            </span>
                            <span>Candidature unique</span>

                        </button>
                        <button
                            class="d-flex justify-content-start flex-column flex-sm-row align-items-center srcChoice btn bg-blue text-snow bg-hover-snow font-weight-bold rounded mx-auto mx-md-5 mt-4 p-2 p-md-5 mb-2 w-75 w-md-50"
                            id="multiple">
                            <span class="mr-3">
                                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-files"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z" />
                                    <path
                                        d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z" />
                                </svg>
                            </span>
                            <span>Préparer plusieurs candidatures</span>

                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>