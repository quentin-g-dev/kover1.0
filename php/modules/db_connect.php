<?php 
    try{
        $db = new PDO('mysql:host=localhost;port=3306;dbname=kover;charset=utf8','kover','kover');
    } catch(PDOException $e) {
        echo 'Erreur: '. $e->getMessage();
        die();
    } 
?>