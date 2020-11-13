function evalSignInForm() {
    if (document.querySelector("#signInName").value.toString().length === 0 || document.querySelector("#signInPass")
        .value.toString().length === 0) {
        alert("Vous n'avez pas rempli tous les champs de connexion.");
        console.log($("#signInName").value);
        return false;
    } else {
        return true;
    }
}


document.querySelector("#signInSubmit").addEventListener("click", function () {
    evalSignInForm();
    if (evalSignInForm() == true) {
        let name = document.querySelector("#signInName").value;
        let password = document.querySelector("#signInPass").value;
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.response == "true") {
                    console.log(this.response);
                    document.querySelector("#connectModal .modal-body").innerHTML = "Connexion réussie !";
                    $("#nav").load("./index.php #nav");
                    getSessionLang();
                    document.querySelector("#connectModal .modal-footer").remove();
                } else {
                    document.querySelector("#connectModal .modal-body").innerHTML += "Un problème est survenu, merci de réessayer plus tard.";

                }
            }
        };
        xhr.open('POST', './ajax/user_connection.php', true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("userName=" + name + "&userPassword=" + password);

    } else {
        console.log('ici');
    }
});