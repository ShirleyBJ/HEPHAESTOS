<?php
    unset($_SESSION);
    if(session_destroy()){
        header('location: ../../../page5.php');
    }else{
        echo "Déconnexion impossible ! ";
    }
?>