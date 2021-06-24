<?php
    session_start();
    //TODO:Vérifier si utilisateur connecté
    include("assets/php/template/template_top.php");
    include("assets/php/template/template_nav.php");
    include("assets\php\inc\alert.inc.php");
    // alert("Connexion réussie !");
?>
<!--HEADER-->
    <header class="header__acount">
        <h1>ESPACE ADMINISTRATEUR</h1>
        <!-- <p>Bienvenue <?php echo $_SESSION['prenom']; ?></p> -->
    </header>
    <main class="user-account">
        <section class="menu__user-account">
            <h3>Bienvenue <?php echo $_SESSION['prenom'];?>,</h3>
            <p> Mes informations personelles</p>
            <p> Messagerie</p>
            <p> Gestion des stocks</p>
            <p> Gestion des clients</p>
            <p> Gestion des employés</p>
            <p><i class="fas fa-sign-out-alt"></i>Se déconnecter</p>
        </section>
        <section class="block__user-data">
        </section>
    </main>
    <?php
include("assets/php/template/template_bottom.php");
?>