<?php
include_once('../inc/constants.inc.php');
include_once('../inc/connection.inc.php');

//Récuperer les données - protection contre attaque XSS
$civilite = isset($_POST['civilite']) ? htmlspecialchars($_POST['civilite']) : '';
$lastName = isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : '';
$firstName = isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : '';
$adress = isset($_POST['adress']) ? htmlspecialchars($_POST['adress']) : '';
$cp = isset($_POST['CP']) ? htmlspecialchars($_POST['CP'] ): '';
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
// echo $pswd;
// echo $dob;
// echo $fonction;
// echo $superieur;
// echo $dHired;
// echo $dFired;

//connection BDD
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
        echo '<a href="../../admin-gestion-employe.php">Retour à la page employés</a>';
    } else{
        $sql = 'INSERT INTO employe(civilite,nom,prenom,adresse,CP,ville,telephone,email,mot_de_passe,date_naissance,fonction,rend_compte,date_embauche,date_fin_contrat) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $qry = $conn->prepare($sql);
        $qry->execute(array($civilite,$lastName,$firstName,$adress,$cp,$city,$tel,$email,$pswd,$dob,$fonction,$superieur,$dHired,$dFired));
        //déconnexion de la variable
        unset($conn);
        header('location:admin-gestion-employe.php');
    }
?>