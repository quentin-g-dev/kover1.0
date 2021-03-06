<main
    class="container-fluid full-container d-flex flex-column p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-around align-items-baseline h-100 rounded">
    <h2 class="mt-0 mb-3 mx-auto text-center">Changer mon nom d'utilisateur</h2>

    <form action="./profile.php?vip=<?= $vip->userId(); ?>" method="post"
        class="d-flex flex-column justify-content-between align-items-center w-75 mw-100 mx-auto mx-auto my-2"
        id="changeName">
        <fieldset class="my-2 d-flex mw-75  justify-content-between">
            <label for="newName" class="mr-3">Votre nouveau nom d'utilisateur</label>
            <input type="text" name="newName" id="newName" placeholder="login" autofocus>
        </fieldset>
        <fieldset class="my-2 d-flex mw-75  justify-content-between">
            <label for="confirmPass" class="mr-3">Votre mot de passe</label>
            <input type="password" name="confirmPass" id="confirmPass" placeholder="********">
        </fieldset>
        <button class="btn text-info border-info mt-3 " type="submit" name="changeNameSubmit">
            CONFIRMER
        </button>
    </form>
</main>