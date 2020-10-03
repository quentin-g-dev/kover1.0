var langCode;

//langCode = ajaxFunction(){//Get $_SESSION['lang'];}

function cleanString(str) {
    let strArr = str.split('');
    for (i in strArr) {
        if (strArr[i] === ' ') {
            strArr[i] === '';
        }
    }
    return strArr.join('');
}

// Avalaible for langCode : 'EN', 'FR'(default), 'ES'

function translate(langCode) {
    var elements = document.querySelectorAll('html *');
    for (let i = 0; i < elements.length; i++) {
        if (elements[i].innerHTML != "" && elements[i].innerHTML != " ") {
            let elementToTest = elements[i].innerHTML;
            for (let j = 0; j < translations.length; j++) {

                /*if (cleanString(elementToTest) === cleanString(translations[j].french) || elementToTest === translations[j].english || elementToTest === translations[j].spanish) {*/
                if (elementToTest.trim() === translations[j].french.trim() || elementToTest === translations[j].english || elementToTest === translations[j].spanish) {

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

translate(document.querySelector(".selectLang").value);

document.querySelector(".selectLang").addEventListener("change", function () {
    langCode = document.querySelector(".selectLang").value;
    translate(langCode);
    //ajaxFunction(){//Set $_SESSION['lang'] => langCode;}

});