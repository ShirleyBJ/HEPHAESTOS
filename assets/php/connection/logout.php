<?php
    //Déconnecter un utilisateur déja authentifié
    session_start();
    //session_destroy sert à détruire la session
    // session_destroy();
    unset($_SESSION['prenom']);
    if(session_destroy()){
        header('location: ../../../page5.php');
    }else{
        echo "Déconnexion impossible ! ";
    }
?>