<?php
session_start();
include_once('../inc/constants.inc.php');
include_once('../inc/connection.inc.php');
include_once('../inc/whoIsConnected.inc.php');

if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    $idUser = $_SESSION['id'];
    $mail = $_SESSION['email'];
    $user = whoIsConnected($mail);
} else{
    header('location:../../../page5.php');
}

//Récuperer les données
$civilite = isset($_POST['civilite']) ? htmlspecialchars($_POST['civilite']) : '';
$lastName = isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : '';
$firstName = isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : '';
$adress = isset($_POST['adress']) ? htmlspecialchars($_POST['adress']) : '';
$cp = isset($_POST['CP']) ? htmlspecialchars($_POST['CP']) : '';
$city = isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : '';
$tel = isset($_POST['tel']) ? htmlspecialchars($_POST['tel'] ): '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$pswd = isset($_POST['pswd']) ? htmlspecialchars($_POST['pswd']) : '';

// echo $civilite;
// echo $lastName;
// echo $firstName;
// echo $adress;
// echo $cp;
// echo $city;
// echo $tel;
// echo $email;
// echo $mail;
// echo $pswd;

try{
    if($user == "Employe"){
        $sql = 'UPDATE employe SET civilite="'.$civilite.'",nom="'.$lastName.'",prenom="'.$firstName.'",adresse="'.$adress.'",CP="'.$cp.'",ville="'.$city.'",telephone="'.$tel.'",email="'.$email.'",mot_de_passe="'.$pswd.'" WHERE numero_employe="'.$idUser.'"';
    } else{
        $sql = 'UPDATE client SET civilite="'.$civilite.'",nom="'.$lastName.'",prenom="'.$firstName.'",adresse="'.$adress.'",CP="'.$cp.'",ville="'.$city.'",telephone="'.$tel.'",email="'.$email.'",mot_de_passe="'.$pswd.'" WHERE numero_client="'.$idUser.'"';
    }

    $conn = connection();
    //Prépare la réquête - éviter les injections sql
    $qry = $conn->prepare($sql);
    //Exécution de la requete
    $qry->execute(array($civilite,$lastName,$firstName,$adress,$cp,$city,$tel,$email,$pswd,$idUser));

    if($mail != $email){
        unset($mail);
        header('location:../../../page5.php');
    }
    
    }catch(PDOException $err){
        echo $err->getMessage();
}

?>