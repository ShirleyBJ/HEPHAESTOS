<!--Menu Navigation bar-->
<section class="menu__user-account">
        <h3>Bienvenue <?php echo $_SESSION['prenom']; ?>,</h3>
        <p><a href="user-infos-perso.php">Mes informations personelles</a></p>
        <p> Messagerie</p>
        <p><i class="fas fa-sign-out-alt"></i><a href="assets/php/connection/logout.php">Se déconnecter</a></p>
</section>