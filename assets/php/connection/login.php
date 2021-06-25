<?php
session_start();
include_once('../inc/constants.inc.php');
include_once('../inc/connexion.php');
include_once('../inc/alert.inc.php');
// Nettoie les données passées dans POST : htmlspecialchars
$mail = (isset($_POST['email']) && !empty($_POST['email'])) ? htmlspecialchars($_POST['email']) : null;
$pass = (isset($_POST['passwd']) && !empty($_POST['email'])) ? htmlspecialchars($_POST['passwd']) : null;


    // Connexion
    try{
        $conn= connection();
        // Préparation requête : paramétrage pour éviter injections SQL
        $qry = $conn->prepare('SELECT * FROM employe WHERE email= ? AND mot_de_passe= ?');
        $qry->execute(array($mail,$pass));
        // Si une ligne est trouvée
        if ($qry->rowCount()=== 1) {
            $row = $qry->fetch();
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['email'] = $row['email'];
            // var_dump($row);
            alert("Connexion réussie !");
            header('location: ../../../admin.php');
        } elseif($qry->rowCount()=== 0){
            $qry = $conn->prepare('SELECT * FROM client WHERE email= ? AND mot_de_passe= ?');
            $qry->execute(array($mail,$pass));
            $row = $qry->fetch();
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['email'] = $row['email'];
            // var_dump($row);
            alert("Connexion réussie !");
            header('location: ../../../user.php');
        } else {
            header('location: ../../../page5.php');
            alert('User inconnu');
        }
    }catch(PDOException $err){
        echo $err ->getMessage();
    }
?>