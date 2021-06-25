<?php
session_start();
//Vérifie si utilisateur connecté sinon redirection
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
    <?php
    include_once("assets/php/template/template_menu-admin.php");
    ?>
    <section class="block__user-data">
    </section>
</main>
<?php
include("assets/php/template/template_bottom.php");
?>