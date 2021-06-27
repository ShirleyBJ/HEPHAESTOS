<?php
session_start();
include_once('../inc/constants.inc.php');
include_once('../inc/connection.inc.php');
include_once('../inc/whoIsConnected.inc.php');

if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    $idUser = $_SESSION['id'];
    $email = $_SESSION['email'];
    $user = whoIsConnected($email);
}

//Récuperer les données
$civilite = isset($_POST['civilite']) ? $_POST['civilite'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$adress = isset($_POST['adress']) ? $_POST['adress'] : '';
$cp = isset($_POST['CP']) ? $_POST['CP'] : '';
$city = isset($_POST['ville']) ? $_POST['ville'] : '';
$tel = isset($_POST['tel']) ? $_POST['tel'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$pswd = isset($_POST['pswd']) ? $_POST['pswd'] : '';

// echo $civilite;
// echo $lastName;
// echo $firstName;
// echo $adress;
// echo $cp;
// echo $city;
// echo $tel;
// echo $email;
// echo $pswd;

if($user == "Employe"){
    $sql = 'UPDATE employe SET civilite="'.$civilite.'",nom="'.$lastName.'",prenom="'.$firstName.'",adresse="'.$adress.'",CP="'.$cp.'",ville="'.$city.'",telephone="'.$tel.'",email="'.$email.'",mot_de_passe="'.$pswd.'" WHERE numero_employe="'.$idUser.'"';
} elseif($user == "Client"){
    $sql = 'UPDATE client SET civilite="'.$civilite.'",nom="'.$lastName.'",prenom="'.$firstName.'",adresse="'.$adress.'",CP="'.$cp.'",ville="'.$city.'",telephone="'.$tel.'",email="'.$email.'",mot_de_passe="'.$pswd.'" WHERE numero_client="'.$idUser.'"';
}

try{
    $conn = connection();
    //Prépare la réquête - éviter les injections sql
    $qry = $conn->prepare($sql);
    //Exécution de la requete
    $qry->execute(array($civilite,$lastName,$firstName,$adress,$cp,$city,$tel,$email,$pswd,$idUser  ));
    $row = $qry->fetch();
    //TODO: Faire redirection vers page infos perso + si changement MDP ou email redirection connection.
}catch(PDOException $err){
    $err->getMessage();
}

?>