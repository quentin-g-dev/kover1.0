function evalSignUpForm() {
    if (evalUserName() === false) {
        return false;
    } else {
        if (evalUserPass() === false) {
            return false;
        } else {
            return true;
        }
    }
}

function evalUserName() {
    if (document.querySelector("input#userName").value.length > 0) {
        if (document.querySelector("input#userName").value.length < 30) {
            if (checkNonWordChars(document.querySelector("input#userName").value)) {
                return true;
            } else {
                alert('Seuls les caractères alphanumériques 0-9 - A-Z et _ sont admis.');
            }
        } else {
            alert('Votre nom d\'utilisateur ne peut dépasser 30 caractères. Merci de faire plus court !');
            return false;
        }
    } else {
        alert('Vous avez oublié de choisir un nom d\'utilisateur !');
        return false;
    }
}

function checkNonWordChars(string) {
    let pattern = /\W/g;
    if (string.match(pattern)) {
        return false;
    } else {
        return true;
    }
}

function evalUserPass() {
    if (document.querySelector("input#userPassword").value.length > 0) {
        if (document.querySelector("input#userPassword").value.length < 50) {
            if (!checkNonWordChars(document.querySelector("input#userPassword").value)) {
                alert('Seuls les caractères alphanumériques 0-9 - A-Z et _ sont admis.');
                return false;
            }
            if (userPassRegEx(document.querySelector("input#userPassword").value) === true) {
                if (document.querySelector("input#userPasswordTwice").value === document.querySelector(
                        "input#userPassword").value) {
                    return true;
                } else {
                    alert('Les deux saisies du mot de passe ne correspondent pas !');
                    return false;
                }
            } else {
                alert('Votre mot de passe doit être composé de 8 caractères au moins, dont au moins un chiffre, une lettre majuscule une lettre minuscule.');
                return false;
            }
        } else {
            alert('Votre mot de passe ne peut dépasser 50 caractères. Merci de faire plus court !');
            return false;
        }
    } else {
        alert('Vous avez oublié de choisir un mot de passe !');
        return false;
    }
}

function userPassRegEx(string) {
    // Le mot de passe être composé de 8 caractères au moins, dont au moins un chiffre, une lettre majuscule une lettre minuscule. 
    let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    if (string.match(pattern)) {
        return true;
    }
    return false;
}


document.querySelector("#signUpSubmit").addEventListener("click", function () {
    //    evalSignUpForm();
    if (evalSignUpForm()) {

        let name = document.querySelector("#userName").value;
        let password = document.querySelector("#userPassword").value;
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.response == "true") {
                    console.log(this.response);

                    document.querySelector("#subscriptionModal .modal-body").innerHTML = "Inscription réussie ! Merci pour votre confiance";
                    $("#nav").load("./index.php #nav");

                } else {
                    document.querySelector("#subscriptionModal .modal-body").innerHTML += "Un problème est survenu, merci de réessayer plus tard.";

                }
            }
        };
        xhr.open('POST', './ajax/user_subscription.php', true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("userName=" + name + "&userPassword=" + password);
    }
});