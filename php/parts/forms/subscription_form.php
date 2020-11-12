<!-- Modal -->
<div class="modal fade" id="subscriptionModal" tabindex="-1" role="dialog" aria-labelledby="subscriptionModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subscriptionModalTitle">Inscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <fieldset class="my-2 d-flex mw-75 w-50 justify-content-between">
                    <label for="userName" class="mr-3">Choisissez un nom d'utilisateur</label>
                    <input type="text" name="userName" id="userName" placeholder="pseudo ou e-mail">
                </fieldset>
                <fieldset class="my-2 d-flex mw-75 w-50 justify-content-between">
                    <label for="userPassword" class="mr-3">Choisissez un mot de passe</label>
                    <input type="password" name="userPassword" id="userPassword" placeholder="********">
                </fieldset>
                <fieldset class="my-2 d-flex mw-75 w-50 justify-content-between">
                    <label for="userPasswordTwice" class="mr-3">Confirmez le mot de passe</label>
                    <input type="password" name="userPasswordTwice" id="userPasswordTwice" placeholder="********">
                </fieldset>
                <fieldset class="my-4 conditions-container">
                    <h3 class="text-center h6">CONDITIONS D'UTILISATION</h3>
                    <p class="conditions border text-justify mw-75 w-50 mx-auto p-3">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus ducimus delectus totam
                        voluptates quaerat dolorem? Exercitationem, nisi quo vel facilis, tempora deleniti accusamus sed
                        doloremque Eaque porro quod repellendus asperiores distinctio. Necessitatibus esse iste delectus
                        officiis ipsa, exercitationem nemo sapiente illo eligendi numquam odit culpa reiciendis vitae!
                        Lorem ipsum
                        dolor sit amet consectetur adipisicing elit. Blanditiis aliquam, aut perspiciatis saepe odio
                        eligendi
                        excepturi eos repellendus est. Voluptatem, laboriosam quidem autem consequatur dolore aliquam
                        nostrum quam
                        maiores voluptate.
                        Quas dolorem necessitatibus vero temporibus odio cupiditate! Quidem voluptate placeat
                        praesentiumn repellendus quo nesciunt, quasi, assumenda vel laudantium ducimus illo
                        reprehenderit molestias
                        maiores atque consequatur numquam id quia inventore ipsa.
                        Repellendus, amet dolores rerum nesciunt mollitia velit porro recusandae consequuntur sit dicta
                        labore suscipit quo repudiandae necessitatibus reiciendis. Quidem aut officiis voluptatum
                        maxime, rem
                        omnis? Consequuntur, molestiae sapiente? Ab, doloremque!
                    </p>
                    <fieldset class="d-flex justify-content-center align-items-center mw-75 w-50 flex-nowrap mx-auto">
                        <input required type="checkbox" name="acceptConditions" id="acceptConditions" value="accepted"
                            class="w-25">
                        <label for="acceptConditions" class="font-weight-bold w-75">J'ai pris connaissance des
                            conditions
                            d'utilisation et m'engage à les respecter.</label>
                    </fieldset>

                </fieldset>
                <button class="btn text-info border-info mt-3 " type="submit" id="signUpSubmit">CONFIRMER
                    L'INSCRIPTION</button>
            </div>
            <div class="modal-footer">
                Vous avez déjà un compte ?
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Connectez-vous</button>
            </div>
        </div>
    </div>
</div>
<script src="./assets/js/sign_up.js"></script>