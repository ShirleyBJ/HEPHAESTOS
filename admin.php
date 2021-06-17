<?php
    session_start();
    //TODO:Vérifier si utilisateur connecté
    include("assets/php/template/template_top.php");
    include("assets/php/template/template_nav.php");
    include("assets\php\inc\alert.inc.php");
    alert("Connexion réussie !");
?>
<!--HEADER-->
    <header class="">
        <h1>ESPACE ADMINISTRATEUR</h1>
        <p>Bienvenue <?php echo $_SESSION['prenom']; ?></p>
    </header>
    <?php
include("assets/php/template/template_bottom.php");
?>