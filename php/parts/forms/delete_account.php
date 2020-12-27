<?php

        $manager->setUserFromSession($vip, $_SESSION['vip']);
        if (isset ($_POST['confirmPass'])){
            echo'set';
            if (hash('whirlpool', htmlspecialchars($_POST['confirmPass']))=== $vip->userHashedPassword()){
                $manager->deleteUser($vip);
                session_destroy();
                header('Location: ./index.php');
            } else {
                header('Location:./profile.php?vip='.$vip->userId().'&sect=param&opt=delete_account');
            }
        }
    
?><main
    class="container-fluid full-container d-flex flex-column p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-around align-items-baseline h-100 rounded">
    <h2 class="mt-0 mb-3 mx-auto text-center">Supprimer mon compte</h2>

    <form action="./profile.php?vip=<?=$vip->userId()?>'&sect=param&opt=delete_account" method="post"
        class="d-flex flex-column justify-content-between align-items-center w-75 mw-100 mx-auto mx-auto my-2"
        id="deleteAccount">
        <fieldset class="my-2 d-flex mw-75 flex-column">
            <label for=" confirmPass" class="mr-3">La suppression du compte est irréversible. Toutes les données
                associées seront également supprimées. Pour confirmer cette action, merci de saisir votre mot de
                passe.</label>
            <input type="password" name="confirmPass" id="confirmPass" autofocus>
        </fieldset>
        <button class="btn text-info border-info mt-3 " type="submit" name="changePassSubmit">
            CONFIRMER
        </button>
    </form>
</main>