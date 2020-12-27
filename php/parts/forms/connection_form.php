<!-- Modal -->
<div class="modal fade bg-blue text-snow" id="connectModal" tabindex="-1" role="dialog"
    aria-labelledby="connectModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="connectModalTitle">Connexion</h5>
                <button type="button" class="close text-snow" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-snow">&times;</span>
                </button>
            </div>
            <div class="modal-body p-1">
                <div class="signInAlerts mx-auto">
                    <div class="alert bg-darkred border-blue text-snow mx-auto alert-dismissible fade w_100"
                        role="alert" id="emptyInputAlert">
                        <strong>Vous n'avez pas rempli tous les champs.</strong>
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true" class="text-snow">&times;</span>
                        </button>
                    </div>
                </div>

                <div class="my-3 d-flex flex-column flex-sm-row justify-content-between">
                    <label for="signInName" class="mr-3">Votre nom d'utilisateur</label>
                    <input type="text" name="signInName" id="signInName" placeholder="login">
                </div>
                <div class="my-3 d-flex flex-column flex-sm-row justify-content-between">
                    <label for="signInPass" class="mr-3">Votre mot de passe</label>
                    <input type="password" name="signInPass" id="signInPass" placeholder="********">
                </div>
                <div class="d-flex justify-content-center align-items-center my-2 p-3">

                    <button class="btn bg-marigold text-blue bg-hover-snow" type="submit" name="signInSubmit"
                        id="signInSubmit">
                        <span>CONNEXION</span>
                        <span class="ml-3">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-square"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z" />
                            </svg>
                        </span>
                    </button>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center align-items-center">
                <span>Vous n'avez pas encore de compte ?</span>

                <button type="button" class="btn bg-blue text-snow bg-hover-snow p-3" data-dismiss="modal"
                    data-toggle="modal" data-target="#subscriptionModal">
                    <span class="mr-3">
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-plus-fill"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                    </span>
                    <span>Inscrivez-vous</span>
                </button>
            </div>
        </div>
    </div>

</div>