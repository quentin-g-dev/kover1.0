<?php

    if (isset($_GET['setLangCode'])){
        $_SESSION['langCode'] = $_GET['setLangCode'];
        if (isset($_SESSION['vip'])){
            $_SESSION['vip']['langCode'] = $_GET['setLangCode'];
        }
    }

    if (isset($_GET['getLangCode'])){
        if (isset($_SESSION['vip'])){
            $_SESSION['langCode'] = $_SESSION['vip']['langCode'];
        }
    }


?>