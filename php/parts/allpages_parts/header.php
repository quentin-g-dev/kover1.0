<body class="bg-kover">
    <header
        class="md-row container full-container flex-column flex-md-row text-snow d-flex justify-content-between justify-content-md-between align-items-center p-0 mt-2 mb-3">
        <div class="siteHeader d-flex justify-content-between align-items-baseline col-md-6 col-lg-8">
            <a href="./index.php">
                <p class="col-md-6 d-inline text-snow display-5 font-weight-bold display-4">
                    KOVER
                </p>
            </a>
            <!--Hamburger-->
            <span class="text-snow  hamburger d-flex d-md-none display-4">
                &#9776;
            </span>
        </div>
        <!--NAV MENU -->
        <nav id="nav"
            class="d-md-flex md-row w-md-25 mt-3 my-md-0 flex-column flex-md-row justify-content-md-end justify-content-start align-items-md-center align-items-start d-none col-md-6 col-lg-4">

            <?php
            if (isset ($_SESSION['vip'])){
                // FOR CONNECTED USERS :
            ?>
            <div
                class="w-100 d-flex h-100 flex-column flex-md-row  justify-content-md-end align-items-md-center justify-content-around align-items-center">

                <span
                    class="userMenu d-md-flex md-row flex-md-row flex-column w-md-auto w-100 justify-content-md-end justify-content-center align-items-md-center align-items-center h-100 d-flex">
                    <a href="./index.php"
                        class="my-3  w-100 my-lg-3 display-5 font-weight-bold text-snow mx-auto text-center"
                        data-toggle="modal" data-target="#srcChoiceModal">
                        <span class="mr-3">

                        </span>
                        <span>Nouveau projet</span>

                    </a>
                    <span class="avatar d-none d-md-inline">
                        <img src="./assets/icons/userprofile.svg" alt="edit">
                    </span>
                    <div class="userOptions d-flex d-md-none flex-column text-snow">
                        <select name="selectLang" id="selectLang"
                            class="custom-select selectLang col-md-2   text-center d-flex justify-content-center align-items-center ">
                            <option value="FR">FR</option>
                            <option value="ES">ES</option>
                            <option value="EN">EN</option>
                        </select>
                        <a href="./profile.php?vip=<?= $vip->userId();?>"
                            class="mx-auto my-3 my-lg-3  display-5 text-snow">
                            Mon Espace
                        </a>
                        <a href="./profile.php?vip=<?= $vip->userId();?>&sect=letters"
                            class="mx-auto  my-3 my-lg-3  display-5 text-snow">
                            Mes Lettres
                        </a>
                        <a href="./profile.php?vip=<?= $vip->userId();?>&sect=param"
                            class="mx-auto  my-3 my-lg-3  display-5 text-snow">
                            Mes Paramètres
                        </a>
                        <a href="./index.php?disc=1" class="disconnect mx-auto my-3 my-lg-3 display-5 text-snow">
                            Déconnexion
                        </a>
                    </div>
                </span>

            </div>


            <?php
            } else {
                // FOR UNCONNECTED USERS :
            ?>
            <div
                class="w-100 d-flex h-100 flex-column flex-md-row  justify-content-md-end align-items-md-center justify-content-center align-items-center h-100">

                <span
                    class="userMenu d-md-flex md-row flex-md-row flex-column w-md-auto w-100 justify-content-md-end justify-content-center align-items-md-center align-items-center  d-flex">

                    <select name="selectLang" id="selectLang"
                        class="custom-select selectLang col-md-2   text-center d-flex justify-content-center align-items-center ">
                        <option value="FR">FR</option>
                        <option value="ES">ES</option>
                        <option value="EN">EN</option>
                    </select>

                    <span class="col-md-2"></span>

                    <a href="./index.php"
                        class="d-flex flex-column justify-content-center align-items-center col-md-5 text-center my-5 my-md-3 display-5 font-weight-bold text-snow row col-md-4 w-auto">
                        <span class="mr-3 mb-1">
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-file-earmark-plus-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7.5 1.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V11a.5.5 0 0 0 1 0V9.5H10a.5.5 0 0 0 0-1H8.5V7z" />
                            </svg>
                        </span>
                        <span>Nouveau projet</span>
                    </a>
                    <span class="col-md-2"></span>

                    <span class="avatar col-md-3 d-none d-md-flex justify-content-center my-5 my-md-3">
                        <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-person-circle"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd"
                                d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                        </svg>
                    </span>

                    <div
                        class="userOptions rounded px-3 py-1 d-flex d-md-none flex-column justify-content-center align-items-center bg-transparent">
                        <button type="button" class="btn bg-marigold text-snow d-flex my-5 my-md-3  font-weight-bold  "
                            data-toggle="modal" data-target="#connectModal" id="signInButton">
                            <span class="mr-3">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-key-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg>
                            </span>
                            <span>Connexion</span>

                        </button>
                        <button type="button" class="btn bg-marigold text-snow d-flex my-5 my-md-3  font-weight-bold "
                            data-toggle="modal" data-target="#subscriptionModal" id="signUpButton">
                            <span class="mr-3"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                    class="bi bi-person-plus-fill" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </span>
                            <span>Inscription</span>
                        </button>
                    </div>
                </span>
            </div>


            <?php
            } 
            ?>

        </nav>
    </header>