<?php
include_once('../inc/constants.inc.php');
include_once('../inc/connection.inc.php');

//Récuperer les données - protection contre attaque XSS
$civilite = isset($_POST['civilite']) ? htmlspecialchars($_POST['civilite']) : '';
$lastName = isset($_POST['lastNameSuscribe']) ? htmlspecialchars($_POST['lastNameSuscribe']) : '';
$firstName = isset($_POST['firstNameSuscribe']) ? htmlspecialchars($_POST['firstNameSuscribe']) : '';
$adress = isset($_POST['adressSuscribe']) ? htmlspecialchars($_POST['adressSuscribe']) : '';
$cp = isset($_POST['CPSuscribe']) ? htmlspecialchars($_POST['CPSuscribe'] ): '';
$city = isset($_POST['villeSuscribe']) ? htmlspecialchars($_POST['villeSuscribe']) : '';
$tel = isset($_POST['telSuscribe']) ? htmlspecialchars($_POST['telSuscribe']) : '';
$email = isset($_POST['mailSuscribe']) ? htmlspecialchars($_POST['mailSuscribe']) : '';
$pswd = isset($_POST['pswd']) ? htmlspecialchars($_POST['pswd']) : '';

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
        //déconnexion de la variable
        unset($conn);
        header('location:login.php?m=ccok');
    }
}catch(PDOException $err){
    $err->getMessage();
}

?>