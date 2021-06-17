<?php
    include("assets/php/template/template_top.php");
    include("assets/php/template/template_nav.php");
?>
    <!--HEADER-->
    <header class="header_account">
        <h1>Bienvenue à HEPHAESTOS</h1>
        <p>Connectez vous à votre compte</p>
    </header>
    <!--MAIN-->
    <main>
        <section class="block-account">
            <form class="form-account" name="formCo" action="">
                <h2>Connexion</h2>
                <label for="idCo">Identifiant : </label>
                <input type="text" name="idCo" id="idCo">
                <label for="pswdCo"> Mot de Passe : </label>
                <input type="password" name="pswdCo" id="pswdCo">
                <input type="submit" value="Envoyer">
                <a href="page7.php" class="link__toSuscribe--style"> Pas encore de compte ? Inscrivez-vous ! </a>
            </form>
        </section>
    </main>
    <?php
    include("assets/php/template/template_bottom.php");
    ?>