<?php

session_start();

$pageTitle = 'Politique de confidentialité';

include './php/parts/allpages_parts/head.php';
include './php/parts/allpages_parts/header.php';

?>

<body>
    <main
        class="container-fluid full-container d-flex flex-column px-md-5 px-3 pb-5 mx-auto mt-3 my-2 w-100 w-lg-75 justify-content-start align-items-baseline h-100 rounded">
        <h1 class="text-center mx-auto my-5">Politique de confidentialité</h1>
        <p class="text-justify font-weight-bold h5 mb-3">En tant qu'éditeur de services en ligne, Kover prend toute
            la
            mesure des enjeux liés à la confidentialité des données de ses visiteurs et utilisateurs.
        </p>
        <br>
        <p class="text-justify">
            Le fonctionnement de ce site exige la collecte et le traitement d'un certain nombre d'informations sur ses
            visiteurs et utilisateurs. Kover s'engage à recueillir uniquement les données nécessaires à son activité
            d'éditeur de services en ligne, à ne pas les conserver au-delà du délai utile (ou légal, le cas échéant), à
            ne pas les communiquer à des tierces parties (sauf obligation légale, ou autorisation expresse de
            l'utilisateur) et à les stocker de façon sécurisée.
        </p>
        <p class="text-justify">Voici les différentes informations que Kover peut être amené à collecter lors de votre
            visite sur le site, ainsi que des indications quant à leur mode de collecte, leur traitement, leur utilité
            pour nos services, leur durée de conservation et les outils mis à votre disposition pour faire valoir vos
            droits concernant ces
            données.
        </p>
        <div id="data-menu" class="d-flex flex-column justify-content-center align-items-start">
            <p class="h3">Accès directs</p>
            <a href="#cookies"><u>Acceptation des cookies</u></a>
            <a href="#language"><u>Option de langue</u></a>
            <a href="#connectionData"><u>Identifiants de connexion</u></a>
            <a href="#email"><u>E-mail</u></a>
            <a href="#subscriptionDateTime"><u>Date et heure de l'inscription</u></a>
            <a href="#connectionDateTime"><u>Date et heure de la connexion</u></a>
            <a href="#personalContent"><u>Contenus personnels</u></a>
        </div>
        <div class="data-details">

            <!--ACCEPT COOKIES-->
            <div class="row w-100 px-2 py-3 border border-dark rounded my-2  mx-auto w-100" id="cookies">
                <p class="h4 col-12 font-weight-bold mb-3  text-center text-md-left">
                    Acceptation des cookies
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Collecte
                </p>
                <p class="col-12 col-md-10">
                    Kover mémorise le choix du visiteur concernant l'acceptation des cookies de navigation via un
                    <strong>formulaire</strong> affiché lors du premier accès au site.
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Traitement
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de conserver dans la mémoire du navigateur le
                    choix du visiteur concernant l'acceptation des autres cookies de navigation <br>
                    Dans le cas où les cookies de navigation n'ont pas été acceptés par le visiteur, celui-ci ne peut
                    bénéficier de tous les services proposés par Kover et son navigateur est orienté vers une page
                    d'information.
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Utilité
                </p>
                <p class="col-12 col-md-10">
                    Le choix du visiteur en matière d'acceptation des cookies permet à Kover d'adapter
                    l'<strong>affichage du site</strong> et son <strong>offre de services</strong>, et de remplir
                    ses <strong>obligations légales en matière de
                        confidentialité</strong>.
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Durée de conservation
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Exercice des droits
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
            </div>

            <!--LANGUAGE OPTION-->
            <div class="row w-100 px-2 py-3 border border-dark rounded my-2  mx-auto w-100" id="language">
                <p class="h4 col-12 font-weight-bold mb-3  text-center text-md-left">
                    Option de langue
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Collecte
                </p>
                <p class="col-12 col-md-10">
                    Kover mémorise la langue choisie par le visiteur via le
                    <strong>sélecteur de langue</strong> disponible dans le menu de navigation du site.
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Traitement
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de conserver dans la mémoire du navigateur la
                    langue choisie, le cas échéant,
                    par le visiteur du site. <br>
                    <strong>L'option de langue d'un utilisateur inscrit est sauvegardée dans une base
                        de données</strong> et communiquée au navigateur via un cookie de session, lors de chaque
                    connexion de
                    l'utilisateur à son compte personnel.
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Utilité
                </p>
                <p class="col-12 col-md-10">
                    L'option de langue permet à Kover d'adapter l'<strong>affichage du site</strong> au choix
                    linguistique du
                    visiteur.
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Durée de conservation
                </p>
                <p class="col-12 col-md-10">
                    L'option de langue d'un visiteur non inscrit est conservée dans la mémoire de son navigateur pendant
                    <strong>la durée de la session</strong>, c'est-à-dire jusqu'à la fermeture du navigateur.<br>
                    <strong>L'option de langue associée à un utilisateur inscrit est conservée en base de données tant
                        que le
                        compte utilisateur concerné y est
                        maintenu</strong>, sauf suppression anticipée de cette donnée à la demande expresse de
                    l'utilisateur.
                    Lorsqu'un utilisateur inscrit ne s'est pas connecté à son espace personnel depuis plus d'un an, son
                    espace personnel est supprimé, ainsi que toutes les données associées (à l'exception, le cas
                    échéant, des informations soumises à une obligation légale de conservation).
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Exercice des droits
                </p>
                <p class="col-12 col-md-10">
                    Lors de sa visite sur Kover, le visiteur peut <strong>refuser l'enregistrement de cookies</strong>
                    dans son
                    navigateur. Il est dans ce cas orienté vers une page d'information.<br>
                    L'option de langue d'un visiteur ou d'un utilisateur inscrit peut faire l'objet d'une
                    <strong>modification</strong>, à tout moment via le
                    sélecteur de langue accessible dans le menu de navigation du site.<br> Un visiteur peut procéder à
                    la <strong>destruction des cookies de session</strong> en fermant son navigateur, ou via les
                    options fournies par ce dernier.<br>
                    Un utilisateur inscrit peut <strong>obtenir une copie</strong> des données enregistrées le
                    concernant,
                    grâce à l'option "Recevoir une copie de mes données", disponible dans son espace personnel.
                    Kover s'engage à accéder à toute demande légitime dans un délai d'un mois à compter de sa
                    réception.<br>
                    L'utilisateur inscrit peut également <strong>demander l'effacement des données</strong> qui le
                    concernent grâce à l'option "Supprimer mon compte", disponible dans son espace personnel .
                    Le choix de cette option donne lieu à la <u>suppression définitive</u> de l'espace personnel de
                    l'utilisateur et des données associées (à l'exception, le cas
                    échéant, des informations soumises à une obligation légale de conservation).
                </p>
            </div>

            <!--CONNECTION IDs-->
            <div class="row w-100 px-2 py-3 border border-dark rounded my-2  mx-auto w-100" id="connectionData">
                <p class="h4 col-12 font-weight-bold mb-3  text-center text-md-left">
                    Identifiants de connexion
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Collecte
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Traitement
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Utilité
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Durée de conservation
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Exercice des droits
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
            </div>

            <!--E-MAIL-->
            <div class="row w-100 px-2 py-3 border border-dark rounded my-2  mx-auto w-100" id="email">
                <p class="h4 col-12 font-weight-bold mb-3  text-center text-md-left">
                    E-mail
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Collecte
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Traitement
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Utilité
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Durée de conservation
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Exercice des droits
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
            </div>


            <!--subscription datetime-->
            <div class="row w-100 px-2 py-3 border border-dark rounded my-2  mx-auto w-100" id="subscriptionDateTime">
                <p class="h4 col-12 font-weight-bold mb-3  text-center text-md-left">
                    Date et heure d'inscription </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Collecte
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Traitement
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Utilité
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Durée de conservation
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Exercice des droits
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
            </div>

            <!--connection datetime-->
            <div class="row w-100 px-2 py-3 border border-dark rounded my-2  mx-auto w-100" id="connectionDateTime">
                <p class="h4 col-12 font-weight-bold mb-3  text-center text-md-left">
                    Date et heure de connexion </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Collecte
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Traitement
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Utilité
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Durée de conservation
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Exercice des droits
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
            </div>

            <!--Personal Content-->
            <div class="row w-100 px-2 py-3 border border-dark rounded my-2  mx-auto w-100" id="personalContent">
                <p class="h4 col-12 font-weight-bold mb-3  text-center text-md-left">
                    Contenus personnels
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Collecte
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Traitement
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Utilité
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Durée de conservation
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
                <p class="col-12 col-md-2 h6 text-center text-md-left">
                    Exercice des droits
                </p>
                <p class="col-12 col-md-10">
                    Un <strong>cookie de session</strong> permet à Kover de mémoriser
                </p>
            </div>



        </div>

    </main>
    <?php

    include './php/parts/allpages_parts/footer.php';
?>
    <script src="./assets/js/general.js"></script>

    <script src="./assets/js/nav_menu.js"></script>
    <script src="./assets/js/translations.js"></script>
    <script src="./assets/js/languages.js"></script>

</body>