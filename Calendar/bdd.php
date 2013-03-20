<?php
function bdd_connect($bddName) {
    //ouverture de la bdd
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $base = new PDO('mysql:host=localhost;dbname=calendar', 'root', '', $pdo_options);
    return $base;
}
?>