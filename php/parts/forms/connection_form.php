<!-- Modal -->
<div class="modal fade" id="connectModal" tabindex="-1" role="dialog" aria-labelledby="connectModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="connectModalTitle">Connexion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <fieldset class="my-2 d-flex mw-75 w-50 justify-content-between">
                    <label for="signInName" class="mr-3">Votre nom d'utilisateur</label>
                    <input type="text" name="signInName" id="signInName" placeholder="login">
                </fieldset>
                <fieldset class="my-2 d-flex mw-75 w-50 justify-content-between">
                    <label for="signInPass" class="mr-3">Votre mot de passe</label>
                    <input type="password" name="signInPass" id="signInPass" placeholder="********">
                </fieldset>
                <button class="btn text-info border-info mt-3 " type="submit" name="signInSubmit" id="signInSubmit">
                    CONNEXION
                </button>
            </div>
            <div class="modal-footer">
                Vous n'avez pas encore de compte ?
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Inscrivez-vous</button>
            </div>
        </div>
    </div>
</div>
<script src="./assets/js/sign_in.js"></script>