<main
        class="signIn container full-container d-flex flex-column p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-around align-items-baseline h-100 rounded"
        id="signIn">    <h2 class="mb-3 text-center">Connexion</h2>
    <form action="" method="post" id="signInForm" class="d-flex flex-column justify-content-between align-items-center w-75 mw-100 mx-auto my-5" onsubmit="return evalSignInForm();">
        <fieldset class="my-2 d-flex mw-75 w-50 justify-content-between">
            <label for="signInName" class="mr-3">Votre nom d'utilisateur</label>
            <input type="text" name="signInName" id="signInName" placeholder="login">
        </fieldset>
        <fieldset class="my-2 d-flex mw-75 w-50 justify-content-between">
            <label for="signInPass" class="mr-3">Votre mot de passe</label>
            <input type="password" name="signInPass" id="signInPass" placeholder="********">
        </fieldset>
        <button class="btn text-info border-info mt-3 " type="submit" name="signInSubmit">
            CONNEXION
        </button>
    </form>
</main>