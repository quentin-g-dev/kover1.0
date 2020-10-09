<main
    class="signUp container-fluid full-container d-flex flex-column p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-around align-items-baseline h-100 rounded"
    id="signUp">
    <h2 class="mt-0 mb-3 text-center mx-auto">Inscription</h2>
    <form action="post_subscription.php" method="post" id="signUpForm"
        class="d-flex flex-column justify-content-between align-items-center w-75 mw-100 mx-auto my-2"
        onsubmit="return evalSignUpForm();">
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
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus ducimus delectus totam voluptates
                quaerat dolorem? Exercitationem, nisi quo vel facilis, tempora deleniti accusamus sed doloremque
                obcaecati modi iusto repellendus in? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque
                porro quod repellendus asperiores distinctio. Necessitatibus esse iste delectus officiis ipsa,
                exercitationem nemo sapiente illo eligendi numquam odit culpa reiciendis vitae! Lorem ipsum dolor sit
                amet consectetur adipisicing elit. Blanditiis aliquam, aut perspiciatis saepe odio eligendi excepturi
                eos repellendus est. Voluptatem, laboriosam quidem autem consequatur dolore aliquam nostrum quam maiores
                voluptate.
                Quas dolorem necessitatibus vero temporibus odio cupiditate! Quidem voluptate placeat praesentium
                repellendus quo nesciunt, quasi, assumenda vel laudantium ducimus illo reprehenderit molestias maiores
                atque consequatur numquam id quia inventore ipsa.
                Repellendus, amet dolores rerum nesciunt mollitia velit porro recusandae consequuntur sit dicta labore
                suscipit quo repudiandae necessitatibus reiciendis. Quidem aut officiis voluptatum maxime, rem omnis?
                Consequuntur, molestiae sapiente? Ab, doloremque!
            </p>
            <fieldset class="d-flex justify-content-center align-items-center mw-75 w-50 flex-nowrap mx-auto">
                <input required type="checkbox" name="acceptConditions" id="acceptConditions" value="accepted"
                    class="w-25">
                <label for="acceptConditions" class="font-weight-bold w-75">J'ai pris connaissance des conditions
                    d'utilisation et m'engage à les respecter.</label>
            </fieldset>

        </fieldset>
        <button class="btn text-info border-info mt-3 " type="submit">CONFIRMER L'INSCRIPTION</button>
    </form>
</main>