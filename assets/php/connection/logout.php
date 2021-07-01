<?php
        if(session_start()){
            echo 'Session démarré';
        }
    unset($_SESSION);
    // unset($_SESSION['prenom']);
    if(session_destroy()){
        header('location: ../../../page5.php');
    }else{
        echo "Déconnexion impossible ! ";
    }
?>