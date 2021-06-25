<?php
session_start();
//TODO:Vérifier si utilisateur connecté
if (isset($_SESSION['prenom']) && !empty($_SESSION['prenom'])){

} else{
    header('location:page5.php');
}
include("assets/php/template/template_top.php");
include("assets/php/template/template_nav.php");
include("assets\php\inc\alert.inc.php");
// alert("Connexion réussie !");
?>
<!--HEADER-->
<header class="header__acount">
    <h1>ESPACE ADMINISTRATEUR</h1>
</header>
<main class="user-account">
    <section class="menu__user-account">
        <h3>Bienvenue <?php echo $_SESSION['prenom']; ?>,</h3>
        <p> Mes informations personelles</p>
        <p> Messagerie</p>
        <p><a href="admin-gestion-client.php">Gestion des clients</a></p>
        <p><a href="admin-gestion-stock.php">Gestion des stocks</a></p>
        <p><a href="admin-gestion-employe.php">Gestion des employés</a></p>
        <p><i class="fas fa-sign-out-alt"></i><a href="assets/php/connection/logout.php">Se déconnecter</a></p>
    </section>
    <section class="block__user-data">
    </section>
</main>
<?php
include("assets/php/template/template_bottom.php");
?>