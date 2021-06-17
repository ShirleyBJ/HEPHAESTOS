<?php
    session_start();
    //TODO:Vérifier si utilisateur connecté
    include("assets/php/template/template_top.php");
    include("assets/php/template/template_nav.php");
    include("assets\php\inc\alert.inc.php")
?>
<!--HEADER-->
    <header class="">
        <h1>Espace Client</h1>
        <p>Bienvenue <?php echo $_SESSION['prenom']; ?></p>
    </header>
    <?php 
    alert("Connexion réussie !");
    ?>
<?php
include("assets/php/template/template_bottom.php");
?>