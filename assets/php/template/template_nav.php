<!--NAV-->
<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('assets/php/inc/constants.inc.php');
?>
<nav id="desktop_menu">
    <a href="index.php"><img class="logo_nav" src="assets/img/logoHephaestos.png" alt="Logo du garage Hephaestos"></a>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="page2.php">Automobile</a></li>
        <li><a href="page3.php">Rénovation</a></li>
        <li><a href="page6.php">Nos produits</a></li>
        <li><a href="page4.php">Contact</a></li>
        <li>
            <?php
            if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
                $email = $_SESSION['email'];
                try{
                    //Connexion BDD
                    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DATA . ';port=' . PORT . ';charset=utf8', USER, PASS);
                    //Gestion des attribut de la connexion : exceptione et retour
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    //Préparation de la requête: paramétrage poour éviter injection sql
                    $sql = 'SELECT COUNT(*) AS nb FROM employe WHERE email=?';
                    $qry = $conn->prepare($sql);
                    //Exécution de la requete
                    $qry->execute(array($email));
                    $row =$qry->fetch();
                    // var_dump($row);
                    if ($row['nb'] == 1) {
                        $link = "<a href=\"user.php\"><i class=\"fas fa-user\"></i></a>";
                        echo $link;
                    }else{
                        //Connexion BDD
                    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DATA . ';port=' . PORT . ';charset=utf8', USER, PASS);
                    //Gestion des attribut de la connexion : exceptione et retour
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    //Préparation de la requête: paramétrage poour éviter injection sql
                    $sql = 'SELECT COUNT(*) AS nb FROM client WHERE email=?';
                    $qry = $conn->prepare($sql);
                    //Exécution de la requete
                    $qry->execute(array($email));
                    $row =$qry->fetch();

                    $link = "<a href=\"user.php\"><i class=\"fas fa-user\"></i></a>";
                        echo $link;
                    }
                }catch(PDOException $err){
                    echo $err->getMessage();
                }
                
            }else{  
                $link = "<a href=\"page5.php\"><i class=\"fas fa-user\"></i></a>";
                echo $link;
            }
            ?>
            
        </li>
    </ul>
    <div class="progress-bar">
        <div class="progress-bar-inner">0%</div>
    </div>
</nav>
<!--Mobile Nav-->
<nav id="mobile_menu">
    <a href="index.php"><img class="logo_nav" src="img/logoHephaestos.png" alt="Logo du garage Hephaestos"></a>
    <details>
        <summary> Menu </summary>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="page2.php">Automobile</a></li>
            <li><a href="page3.php">Rénovation</a></li>
            <li><a href="page6.php">Nos produits</a></li>
            <li><a href="page4.php">Contact</a></li>
            <li><a href="page5.php">Mon Compte</a></li>
        </ul>
    </details>
</nav>