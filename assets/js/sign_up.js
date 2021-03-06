function evalSignUpForm() {
    if (evalUserName() === false) {
        return false;
    } else {
        return (evalUserPass() === false) ? false : true;
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
    return (string.match(pattern)) ? false : true;
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
    return (string.match(pattern)) ? true : false;
}


document.querySelector("#signUpSubmit").addEventListener("click", function () {
    if (evalSignUpForm()) {
        let uName = sanitizeHTML(document.querySelector("#userName").value);
        let passwd = sanitizeHTML(document.querySelector("#userPassword").value);
        var call = new XMLHttpRequest();
        call.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.response == "true") {
                console.log(this.response);
                document.querySelector("#subscriptionModal .modal-body").innerHTML = "Inscription réussie !";
                document.querySelector("#subscriptionModal .modal-footer").remove();
                $("#nav").load("./index.php #nav");
            } else {
                console.log(this.response);
                document.querySelector("#subscriptionModal .modal-body").innerHTML += "Un problème est survenu, merci de réessayer plus tard.";
            }
        }
    };
    call.open('POST', "./ajax/user_subscription.php", true);
    call.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    call.send("userName=" + uName + "&userPassword="+ passwd);

    } 
});