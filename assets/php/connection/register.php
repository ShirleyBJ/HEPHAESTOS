<?php
include_once('../inc/constants.inc.php');
include_once('../inc/connection.inc.php');
echo 'Traitement inscription';
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';


//Récuperer les données
$civilite = isset($_POST['civilite']) ? $_POST['civilite'] : '';
$lastName = isset($_POST['lastNameSuscribe']) ? $_POST['lastNameSuscribe'] : '';
$firstName = isset($_POST['firstNameSuscribe']) ? $_POST['firstNameSuscribe'] : '';
$adress = isset($_POST['adressSuscribe']) ? $_POST['adressSuscribe'] : '';
$cp = isset($_POST['CPSuscribe']) ? $_POST['CPSuscribe'] : '';
$city = isset($_POST['villeSuscribe']) ? $_POST['villeSuscribe'] : '';
$tel = isset($_POST['telSuscribe']) ? $_POST['telSuscribe'] : '';
$email = isset($_POST['mailSuscribe']) ? $_POST['mailSuscribe'] : '';
$pswd = isset($_POST['pswdSuscribe']) ? $_POST['pswdSuscribe'] : '';

// echo $civilite;
// echo $lastName;
// echo $firstName;
// echo $adress;
// echo $cp;
// echo $city;
// echo $tel;
// echo $email;
// echo $pswd;

//Teste si le mail n'existe pas déja
try{
    $conn = connection();
    $sql = 'SELECT COUNT(*) AS nb FROM client WHERE email=?'; //paramétrage anonyme
    //Prépare la réquête - éviter les injections sql
    $qry = $conn->prepare($sql);
    //Exécution de la requete
    $qry->execute(array($email));
    $row = $qry->fetch();
    var_dump($row);
    if($row['nb'] == 1){
        echo '<p>Cette adress mail existe déja </p>';
        echo '<a href="../../page7.php">Retour à la page inscription</a>';
    } else{
        $sql = 'INSERT INTO client(civilite,nom,prenom,adresse,CP,ville,telephone,email,mot_de_passe) VALUES(?,?,?,?,?,?,?,?,?)';
        $qry = $conn->prepare($sql);
        $qry->execute(array($civilite,$lastName,$firstName,$adress,$cp,$city,$tel,$email,$pswd));
        //déconnexion de la varible
        unset($conn);
        header('location:login.php?m=ccok');
        echo 'Inscription réussi ! ';
    }
}catch(PDOException $err){
    $err->getMessage();
}

?>