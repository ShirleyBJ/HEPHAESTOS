<?php
    session_start();
    //Vérifie si utilisateur connecté, sino redirection vers page connexion
    if (isset($_SESSION['prenom']) && !empty($_SESSION['prenom'])){
    } else{
        header('location:page5.php');
    }
    include("assets/php/template/template_top.php");
    include("assets/php/template/template_nav.php");
    include("assets\php\inc\alert.inc.php")
?>
<!--HEADER-->
    <header class="">
        <h1>Espace Client</h1>
        <p>Bienvenue <?php echo $_SESSION['prenom']; ?></p>
    </header>
    <main>
    <?php
    include_once("assets/php/template/template_menu-user.php");
    ?>
    <section class="block__user-data">
    </section>
    </main>
    <?php 
    alert("Connexion réussie !");
    ?>
<?php
include("assets/php/template/template_bottom.php");
?>