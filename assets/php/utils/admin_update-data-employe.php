<?php
session_start();
include_once('../inc/constants.inc.php');
include_once('../inc/connection.inc.php');

if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    //Récuperer les données
    $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
    $civilite = isset($_POST['civilite']) ? htmlspecialchars($_POST['civilite']) : '';
    $lastName = isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : '';
    $firstName = isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : '';
    $adress = isset($_POST['adress']) ? htmlspecialchars($_POST['adress']) : '';
    $cp = isset($_POST['CP']) ? htmlspecialchars($_POST['CP']) : '';
    $city = isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : '';
    $tel = isset($_POST['tel']) ? htmlspecialchars($_POST['tel']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $pswd = isset($_POST['pswd']) ? htmlspecialchars($_POST['pswd']) : '';
    $dob = isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : '';
    $fonction = isset($_POST['fonction']) ? htmlspecialchars($_POST['fonction']) : '';
    $superieur = isset($_POST['superieur']) ? htmlspecialchars($_POST['superieur']) : '';
    $dHired = isset($_POST['dEmbauche']) ? htmlspecialchars($_POST['dEmbauche']) : '';
    $dFired = isset($_POST['dFinContrat']) ? htmlspecialchars($_POST['dFinContrat']) : '';
    // echo $civilite;
    // echo $lastName;
    // echo $firstName;
    // echo $adress;
    // echo $cp;
    // echo $city;
    // echo $tel;
    // echo $email;
    // echo $email;
    // echo $pswd;
    // echo $dob;
    // echo $fonction;
    // echo $superieur;
    // echo $dHired;
    // echo $dFired;
    // echo $id;
    try {
        //SQL: UPDATE employe
        // SET civilite = "Mme",
        // nom="Franklin",
        // prenom="Aretha",
        // adresse="WildStory",
        // CP="00000",
        // ville="Jackson",
        // telephone="0102030405",
        // email="aretha.franklin@gmail.com",
        // date_naissance="18/05/1980",
        // fonction="RH",
        // rend_compte="gérant",
        // date_embauche= "2021-07-08",
        // date_fin_contrat=""
        // WHERE numero_employe = 6;
        $sql = 'UPDATE employe SET civilite="'.$civilite.'",nom="'.$lastName.'",prenom="'.$firstName.'",adresse="'.$adress.'",CP="'.$cp.'",ville="'.$city.'",telephone="'.$tel.'",email="'.$email.'",date_naissance="'.$dob.'",fonction="'.$fonction.'",rend_compte="'.$superieur.'",date_embauche="'.$dHired.'",date_fin_contrat="'.$dFired.'" WHERE numero_employe="'.$id.'"';
        $conn = connection();
        //Prépare la réquête - éviter les injections sql
        $qry = $conn->prepare($sql);
        //Exécution de la requete
        $qry->execute(array($civilite, $lastName, $firstName, $adress, $cp, $city, $tel, $email, $dob,$fonction,$superieur,$dHired,$dFired,$id));
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
} else {
    header('location:../../../page5.php');
}




