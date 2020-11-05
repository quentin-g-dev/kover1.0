<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/fonts.css">

    <?php  // App Core scripts
        if ($_SERVER['REQUEST_URI']==='/dwwm/KOVER/kover1.0/index.php'){
    ?>
    <script src="./assets/js/general.js"></script>
    <script src="./assets/js/View.js"></script>
    <script src="./assets/js/Project.js"></script>
    <script src="./assets/js/main.js"></script>
    <?php 
        }
    ?>
    <title>
        <?echo $pageTitle;?>
    </title>
</head>