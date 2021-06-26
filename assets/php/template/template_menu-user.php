<?php
include_once("assets/php/inc/whoIsConnected.inc.php");
if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
        $email = $_SESSION['email'];
        $user = whoIsConnected($email);
}
?>
<!--Menu Navigation bar-->
<section class="menu__user-account">
        <h3>Bienvenue <?php echo $_SESSION['prenom']; ?>,
        </h3>
        <p><a href="user-infos-perso.php">Mes informations personelles</a></p>
        <p> Messagerie</p>
        <?php
                if($user == 'Employe'){
                        echo "<p><a href=\"admin-gestion-client.php\">Gestion des clients</a></p>
                        <p><a href=\"admin-gestion-stock.php\">Gestion des stocks</a></p>
                        <p><a href=\"admin-gestion-employe.php\">Gestion des employés</a></p>";
                }
        ?>
        <p><i class="fas fa-sign-out-alt"></i><a href="assets/php/connection/logout.php">Se déconnecter</a></p>
</section>