<?php
    session_start();
    include("assets/php/template/template_top.php");
    include("assets/php/template/template_nav.php");

    //Vérifie si utilisateur connecté, sinon redirection vers page connexion
    if(isset($_SESSION['prenom']) && !empty($_SESSION['prenom'])){
    } else{
        header('location:page5.php');
    }
?>  
<!--HEADER-->
    <?php  
    include_once("assets/php/template/template_header-user.php");
    ?>
    <main>
    <?php
    include_once("assets/php/template/template_menu-user.php");
    ?>
    <section class="block__user-data">
    </section>
    </main>
<?php
include("assets/php/template/template_bottom.php");
?>