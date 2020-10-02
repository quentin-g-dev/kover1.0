function toggleMenu() {
    if (document.querySelector("nav").className === "hidden d-flex flex-row flex-wrap border-white justify-content-center align-items-center") {
        document.querySelector("nav").className = "d-flex flex-row flex-wrap border-white justify-content-center align-items-center";
    } else {
        document.querySelector("nav").className = "hidden d-flex flex-row flex-wrap border-white justify-content-center align-items-center";
    }
}

document.querySelector(".hamburger").addEventListener("click", toggleMenu);