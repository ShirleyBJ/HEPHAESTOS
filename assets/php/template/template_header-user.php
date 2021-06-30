<?php
include_once("assets/php/inc/whoIsConnected.inc.php");
if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
        $email = $_SESSION['email'];
        $user = whoIsConnected($email);
}
?>
<!--HEADER Account-->
<header class="header__acount">
    <h1>ESPACE <?php if($user == 'Employe'){
        echo "ADMINISTRATEUR";
        } elseif($user == 'Client'){
            echo "CLIENT";
        } ?></h1>
</header>