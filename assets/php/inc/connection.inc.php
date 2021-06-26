<?php
//Fonction de connexion à la BDD
function connection(){
    //Connexion BDD
    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DATA . ';port=' . PORT . ';charset=utf8', USER, PASS);
    //Gestion des attribut de la connexion : exceptione et retour
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $conn;
}
?>