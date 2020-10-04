<?php
    session_start();

 ///////////////////////////////////////////////////////////////////////// getLangCode
 if(isset($_GET['whichlang'])){
    if(isset($_SESSION['langCode'])){
        $code = $_SESSION['langCode'];
        echo $code;
        return $code;
        
    } else {
        $_SESSION['langCode'] = 'FR';
        $code = $_SESSION['langCode'];
        echo $code;
        return $code;
    }
}


//////////////////////////////////////////////////////////////////////// setLangCode

    if(isset($_GET['lang'])){
        $lang=$_GET['lang'];
        $_SESSION['langCode'] = $lang;
        if (isset($_SESSION['vip'])){
            $_SESSION['vip']['langCode'] = $lang;
        }
        $code = $_SESSION['langCode'];
        echo $code;
        return $code;
    }
   
?>