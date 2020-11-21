describe("Cookies modal", function () {
    var cookie;
    describe("Modal displaying", function () {
        it("should display a modal if user navigator has no cookie from Kover", function () {
            cookie = undefined;
            expect(displayCookiesModal(cookie)).toBeTruthy();
        });
        it("should display a modal if user navigator has a cookie 'cookies' set to false", function () {
            cookie = false;
            expect(displayCookiesModal(cookie)).toBeTruthy();
        });
        it("should display a modal if user navigator has a cookie 'cookies' set to an other value than true or false", function () {
            cookie = 1;
            expect(displayCookiesModal(cookie)).toBeTruthy();
        });
        it("should display a modal if user navigator has a cookie 'cookies' which value is empty", function () {
            cookie = '';
            expect(displayCookiesModal(cookie)).toBeTruthy();
        });
        it("should display a modal if user navigator has a cookie 'cookies' which value is null", function () {
            cookie = null;
            expect(displayCookiesModal(cookie)).toBeTruthy();
        });
        it("should NOT display a modal if user navigator has a cookie 'cookies' which value is true", function () {
            cookie = true;
            expect(displayCookiesModal(cookie)).not.toBeTruthy();
        });
    });
});

describe("Cookies user's choice", function () {

    describe("Set user's cookie 'cookie'", function () {
        var cookie = new Boolean();

        it("should be false if user clicks NO", function () {
            userChoice = false;
            cookie = setCookie(cookie, userChoice);
            expect(cookie).toBeFalsy();
        });
        it("should be true if user clicks YES", function () {
            userChoice = true;
            cookie = setCookie(cookie, userChoice);
            expect(cookie).toBeTruthy();
        });
    });

    describe("Display content depending on cookies user's choice", function () {
        var cookie = new Boolean();

        it("should give the url ./no-cookie.php if cookie 'cookies' is false (to redirect but tests don't like it)", function () {
            cookie = false;
            expect(displayContent(cookie)).toEqual("./no-cookie.php");
        });
        it("should give current url if cookie 'cookies' is true (to redirect but tests don't like it)", function () {
            cookie = true;
            expect(displayContent(cookie)).toEqual(window.location.href);
        });
    });
});