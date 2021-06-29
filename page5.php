<?php
    session_start();
    include_once("assets/php/template/template_top.php");
    include_once("assets/php/template/template_nav.php");
    include_once("assets/php/inc/alert.inc.php");
?>
    <!--HEADER-->
    <header class="header_account">
        <h1>Bienvenue à HEPHAESTOS</h1>
        <p>Connectez vous à votre compte</p>
    </header>
    <!--MAIN-->
    <main>
        <section class="block-account">
            <form action="assets/php/connection/login.php" method="POST"  class="form-account" name="formCo">
                <h2>Connexion</h2>
                <label for="email">Identifiant : </label>
                <input type="text" name="email" id="email" required>
                <label for="passwd"> Mot de Passe : </label>
                <input type="password" name="passwd" id="passwd" required>
                <input type="submit" value="Envoyer">
                <a href="page7.php" class="link__toSuscribe--style"> Pas encore de compte ? Inscrivez-vous ! </a>
            </form>
        </section>
    </main>
    <?php
    include("assets/php/template/template_bottom.php");
    ?>