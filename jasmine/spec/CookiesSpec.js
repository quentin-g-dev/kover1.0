describe('Detecting & reading cookie "cookies"', function () {

    afterEach(function () {
        document.cookie = "cookies=; expires=Thu, 01 Jan 1970 00:00:00 UTC;Secure;"
    });

    describe("Checking if a cookie 'cookies' exists in the user's navigator", function () {
        it("should return a true boolean value if if exists and if its value is 'true'",
            function () {
                document.cookie = "cookies=true;expires=" + Date.now() + 60 * 100 + ";path=/;Secure;";
                expect(detectCookie('cookies')).toEqual(true);
            }
        );
        it("should return an undefined item  if if exists and if its value is 'false'",
            function () {
                document.cookie = "cookies=false;expires=" + Date.now() + 60 * 100 + ";path=/;Secure;";
                expect(detectCookie('cookies')).toEqual(undefined);
            }
        );
        it("should destroy the cookie and return an undefined item if the cookie first exists and if its value is not a boolean",
            function () {
                document.cookie = "cookies=hacked;expires=" + Date.now() + 60 * 100 + ";path=/;Secure;";
                expect(detectCookie('cookies')).toEqual(undefined);
            }
        );
        it("should return an undefined item if it doesn't exist",
            function () {
                document.cookie = "cookies=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;Secure;";
                expect(detectCookie('cookies')).toEqual(undefined);
            }
        );
    });
});

describe("Cookies modal", function () {

    describe("Modal displaying", function () {
        var cookie;

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