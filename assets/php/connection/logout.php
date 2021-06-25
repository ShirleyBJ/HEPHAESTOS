<?php
//Déconnecter un utilisateur déja authentifié
session_start();
//session_destroy sert à détruire la session
// session_destroy();
unset($_SESSION['prenom']);
if(session_destroy()){
    echo "Vous êtes bien déconnnectés ! ";
}else{
    echo "Déconnexion impossible ! ";
}

echo "Vous êtes bien déconnnectés ! ";

//TODO: Demander à Dorian, si meilleur utilisation de session_destroy ou unset (nettoyer variable de session )
?>