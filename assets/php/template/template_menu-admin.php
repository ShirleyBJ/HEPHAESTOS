<!--Menu Navigation bar-->
<section class="menu__user-account">
        <h3>Bienvenue <?php echo $_SESSION['prenom']; ?>,</h3>
        <p> Mes informations personelles</p>
        <p> Messagerie</p>
        <p><a href="admin-gestion-client.php">Gestion des clients</a></p>
        <p><a href="admin-gestion-stock.php">Gestion des stocks</a></p>
        <p><a href="admin-gestion-employe.php">Gestion des employés</a></p>
        <p><i class="fas fa-sign-out-alt"></i><a href="assets/php/connection/logout.php">Se déconnecter</a></p>
</section>