<h2 class="mt-0 mb-3 mx-auto text-center">Changer mon nom d'utilisateur</h2>

<form action="profile.php?vip=<?echo $_SESSION['user']['id'];?>" method="post" class="d-flex flex-column justify-content-between align-items-center w-75 mw-100 mx-auto mx-auto my-2"
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
