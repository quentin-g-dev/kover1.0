<!-- Modal -->
<div class="modal fade bg-blue text-snow" id="subscriptionModal" tabindex="-1" role="dialog"
    aria-labelledby="subscriptionModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="subscriptionModalTitle">Inscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-snow">&times;</span>
                </button>
            </div>
            <div class="modal-body p-1">

                <!--Alertes // Prévalidation des saisies utilisateurs-->
                <?php include './php/alerts/sign_up_alerts.php'; ?>
                <!------------------------------------------------------>
                    <div class="my-3 d-flex flex-column flex-sm-row justify-content-between">
                        <label for="userName" class="mr-3">Choisissez un pseudo</label>
                        <input type="text" name="userName" id="userName" placeholder="pseudo ou e-mail">
                    </div>
                    <div class="my-3 d-flex flex-column flex-sm-row justify-content-between">
                        <label for="userPassword" class="mr-3">Choisissez un mot de passe</label>
                        <input type="password" name="userPassword" id="userPassword" placeholder="********">
                    </div>
                    <div class="my-3 d-flex flex-column flex-sm-row justify-content-between">
                        <label for="userPasswordTwice" class="mr-3">Confirmez votre mot de passe</label>
                        <input type="password" name="userPasswordTwice" id="userPasswordTwice" placeholder="********">
                    </div>
                    <div class="my-2 conditions-container d-flex flex-column justify-content-center align-items-center">
                        <h3 class="text-sm-center h6">CONDITIONS D'UTILISATION</h3>
                        <p class="conditions border text-justify  mx-auto p-3">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus ducimus delectus totam
                            voluptates quaerat dolorem? Exercitationem, nisi quo vel facilis, tempora deleniti accusamus sed
                            doloremque Eaque porro quod repellendus asperiores distinctio. Necessitatibus esse iste delectus
                            officiis ipsa, exercitationem nemo sapiente illo eligendi numquam odit culpa reiciendis vitae!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis aliquam, aut perspiciatis saepe odio
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
                        <div class="d-flex justify-content-center align-items-md-center flex-nowrap px-1">
                            <input required type="checkbox" name="acceptConditions" id="acceptConditions" value="accepted"
                                class="mr-3">
                            <label for="acceptConditions" class="">J'ai pris connaissance des conditions d'utilisation et
                                je m'engage à les respecter.</label>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center align-items-center mb-5 p-3">
                        <button class="btn bg-marigold text-blue bg-hover-snow" id="signUpSubmit">
                            <span>CONFIRMER L'INSCRIPTION</span>
                            <span class="ml-3">
                                <?php include './assets/icons/startarrow.svg'; ?>
                            </span>
                        </button>
                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-center align-items-center">
                <span>Vous avez déjà un compte ?</span>

                <button type="button" class="btn bg-blue text-snow bg-hover-snow p-3" data-dismiss="modal"
                    data-toggle="modal" data-target="#connectModal">
                    <span class="mr-3">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>
                    </span>
                    <span>Connectez-vous</span>
                </button>
            </div>
        </div>
    </div>
</div>
