<body class="bg-kover">
    <header
        class="md-row container full-container flex-column flex-md-row text-white d-flex justify-content-between justify-content-md-between align-items-center p-0 mt-2 mb-3">
        <div class="siteHeader d-flex justify-content-between align-items-baseline col-md-6 col-lg-8">
            <a href="./index.php">
                <p class="col-md-6 d-inline text-white display-5 font-weight-bold display-4">
                    KOVER
                </p>
            </a>
            <!--Hamburger-->
            <span class="text-white  hamburger d-flex d-md-none display-4">
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
                        class="my-3  w-100 my-lg-3 display-5 font-weight-bold text-white mx-auto text-center"
                        data-toggle="modal" data-target="#srcChoiceModal">
                        Nouveau projet
                    </a>
                    <span class="avatar d-none d-md-inline">
                        <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-person-circle"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd"
                                d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                        </svg>
                    </span>
                    <div class="userOptions d-flex d-md-none flex-column text-white">
                        <select name="selectLang" id="selectLang"
                            class="w-25 text-center d-flex justify-content-center align-items-center  selectLang my-5 my-md-3 mx-auto">
                            <option value="FR">FR</option>
                            <option value="ES">ES</option>
                            <option value="EN">EN</option>
                        </select>
                        <a href="./profile.php?vip=<?= $vip->userId();?>"
                            class="mx-auto my-3 my-lg-3  display-5 text-white">
                            Mon Espace
                        </a>
                        <a href="./profile.php?vip=<?= $vip->userId();?>&sect=letters"
                            class="mx-auto  my-3 my-lg-3  display-5 text-white">
                            Mes Lettres
                        </a>
                        <a href="./profile.php?vip=<?= $vip->userId();?>&sect=param"
                            class="mx-auto  my-3 my-lg-3  display-5 text-white">
                            Mes Paramètres
                        </a>
                        <a href="./index.php?disc=1" class="disconnect mx-auto my-3 my-lg-3 display-5 text-white">
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
                        class="w-25 text-center d-flex justify-content-center align-items-center col-md-2 selectLang my-5 my-md-3">
                        <option value="FR">FR</option>
                        <option value="ES">ES</option>
                        <option value="EN">EN</option>
                    </select>
                    <span class="col-lg-4"></span>

                    <a href="./index.php"
                        class="d-flex justify-content-center col-md-5 text-center my-5 my-md-3 display-5 font-weight-bold text-white row col-md-4 w-auto">
                        Nouveau
                        projet
                    </a>
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

                    <div class="userOptions d-flex d-md-none flex-column">
                        <button type="button" class="btn bg-light my-5 my-md-3 display-5 font-weight-bold text-kover"
                            data-toggle="modal" data-target="#connectModal" id="connectionButton">
                            Connexion
                        </button>
                        <button type="button" class="btn bg-light my-3 my-lg-3 display-5 font-weight-bold text-kover"
                            data-toggle="modal" data-target="#subscriptionModal" id="subscriptionButton">
                            Inscription
                        </button>
                    </div>
                </span>
            </div>


            <?php
            } 
            ?>

        </nav>
    </header>