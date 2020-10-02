<?php
    try{
        $db = new PDO('mysql:host=localhost;dbname=kover', 'root', '');
        $db->exec('SET NAMES "UTF8"');
    } catch(PDOException $e) {
        echo 'Erreur: '. $e->getMessage();
        die();
    }