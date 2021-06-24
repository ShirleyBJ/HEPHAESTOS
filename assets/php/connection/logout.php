<?php
//Déconnecter un utilisateur déja authentifié
session_start();
//session_destroy sert à détruire la session
session_destroy();
echo "Vous êtes bien déconnnectés ! ";
?>