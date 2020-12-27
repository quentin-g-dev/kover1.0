// Avalaible for langCode : 'EN', 'FR'(default), 'ES'

function translateTo(langCode) {
    console.log(langCode);
    var elements = document.querySelectorAll('html *');

    for (let i = 0; i < elements.length; i++) {

        if (elements[i].innerHTML != "" && elements[i].innerHTML != " ") {
            let elementToTest = elements[i].innerHTML;

            for (let j = 0; j < translations.length; j++) {
                if (elementToTest.trim() === translations[j].french.trim() || elementToTest.trim() === translations[j].english.trim() || elementToTest.trim() === translations[j].spanish.trim()) {
                    switch (langCode) {
                        case 'EN':
                            elements[i].innerHTML = translations[j].english;
                            break;
                        case 'FR':
                            elements[i].innerHTML = translations[j].french;
                            break;
                        case 'ES':
                            elements[i].innerHTML = translations[j].spanish;
                            break;
                        default:
                            elements[i].innerHTML = translations[j].english;
                            break;
                    }
                }
            }
        }
    }
}

function getSessionLang() {
    var call = new XMLHttpRequest();
    call.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log('lang to mermorize is :', this.response);
            document.querySelector("#selectLang").value = this.response;
            let lang = this.response;
            setSessionLang(lang);
            translateTo(lang);
            return this.response;
        }
    };
    call.open("GET", "./ajax/session_lang.php?whichlang=1", true);
    call.send();
}


function setSessionLang(langCode) {
    console.log(langCode);
    var call = new XMLHttpRequest();
    call.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log('session lang set to :', this.response);
            console.log(this.response.length);
            document.querySelector("#selectLang option[value=" + this.response + "]").selected = "true";
        }
    };
    call.open('POST', "./ajax/session_lang.php", true);
    call.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    call.send("lang=" + langCode);
}

//////////////////////////////////////////////////////////// EXECUTION


var lang = getSessionLang();

document.querySelector("#selectLang").addEventListener("change", function () {
    console.log("change");
    lang = sanitizeHTML(document.querySelector(".selectLang").value);
    console.log(lang);
    translateTo(lang);
    setSessionLang(lang);
    if (document.querySelectorAll("#userLang")) {
        $('#userLang').load("./profile.php?vip=7 #userLang");
    }
});