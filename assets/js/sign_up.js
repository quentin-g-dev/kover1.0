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
                enableAlert('#acceptedCharsAlert');
            }
        } else {
            enableAlert('#nameTooLongAlert');
            return false;
        }
    } else {
        enableAlert('#emptyUserNameAlert');
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
                enableAlert('#acceptedCharsAlert');
                return false;
            }
            if (userPassRegEx(document.querySelector("input#userPassword").value) === true) {
                if (document.querySelector("input#userPasswordTwice").value === document.querySelector(
                        "input#userPassword").value) {
                    return true;
                } else {
                    enableAlert('#passwordsDontMatchAlert')
                    return false;
                }
            } else {
                enableAlert('#passwordPathAlert')
                return false;
            }
        } else {
            enableAlert('#passwordLengthAlert')
            return false;
        }
    } else {
        enableAlert('#emptyPasswordAlert');
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

        let name = sanitizeHTML(document.querySelector("#userName").value);
        let password = sanitizeHTML(document.querySelector("#userPassword").value);
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.response == "true") {
                    console.log(this.response);

                    document.querySelector("#subscriptionModal .modal-body").innerHTML = "Inscription réussie !";
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