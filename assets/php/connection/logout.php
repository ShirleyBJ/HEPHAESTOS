<?php
//Déconnecter un utilisateur déja authentifié
session_start();
include_once('../inc/alert.inc.php');
//session_destroy sert à détruire la session
// session_destroy();
unset($_SESSION['prenom']);
if(session_destroy()){
    header('location: ../../../page5.php');
}else{
    echo "Déconnexion impossible ! ";
}

//TODO: Demander à Dorian, si meilleur utilisation de session_destroy ou unset (nettoyer variable de session )
?>