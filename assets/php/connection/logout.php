<?php
    session_start();
    unset($_SESSION['prenom']);
    if(session_destroy()){
        header('location: ../../../page5.php');
    }else{
        echo "Déconnexion impossible ! ";
    }
?>