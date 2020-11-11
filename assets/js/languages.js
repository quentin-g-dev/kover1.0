// Avalaible for langCode : 'EN', 'FR'(default), 'ES'

function translateTo(langCode) {
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
                            elements[i].innerHTML = translations[j].french;
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
            document.querySelector('option[value="' + this.response + '"]').selected = "true";
            translateTo(this.response);

            return (this.response);
        }
    };
    call.open("GET", "./ajax/session_lang.php?whichlang=1", true);
    call.send("whichlang=1");
}


function setSessionLang(langCode) {
    var call = new XMLHttpRequest();
    call.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log('session lang set to :', this.response);
        }
    };
    call.open('GET', "./ajax/session_lang.php?lang=" + lang + "", true);
    call.send("lang=" + langCode);
}

//////////////////////////////////////////////////////////// EXECUTION
document.addEventListener("DOMContentLoaded", function () {

    lang = getSessionLang();
    if (lang === undefined) {
        lang = "FR";
    }
    translateTo(lang);
    setSessionLang(lang);
    document.querySelector(".selectLang").addEventListener("change", function () {
        lang = document.querySelector(".selectLang").value;
        translateTo(lang);
        setSessionLang(lang);
        if (document.querySelectorAll("#userLang")) {
            $('#userLang').load("./profile.php?vip=7 #userLang");
        }
    });
});