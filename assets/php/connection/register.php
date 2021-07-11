<?php
include_once('../inc/constants.inc.php');
include_once('../inc/connection.inc.php');
include_once('../inc/whoIsConnected.inc.php');

//Récuperer les données - protection contre attaque XSS
$civilite = isset($_POST['civilite']) ? htmlspecialchars($_POST['civilite']) : '';
$lastName = isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : '';
$firstName = isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : '';
$adress = isset($_POST['adress']) ? htmlspecialchars($_POST['adress']) : '';
$cp = isset($_POST['CP']) ? htmlspecialchars($_POST['CP'] ): '';
$city = isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : '';
$tel = isset($_POST['tel']) ? htmlspecialchars($_POST['tel']) : '';
$email = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
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
        // // Redirection
        if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
            if($user == 'Employe'){
                header('location:../../../admin-gestion-client.php');
            }
        }else {
            header('location:../../../page5.php');
        }
    }
    //déconnexion de la variable
    unset($conn);
}catch(PDOException $err){
    $err->getMessage();
}

?>