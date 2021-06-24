<?php
session_start();
include("assets/php/template/template_top.php");
include("assets/php/template/template_nav.php");
include("assets/php/inc/alert.inc.php");
include_once("assets/php/inc/constants.inc.php");
// alert("Connexion réussie !");
?>
<!--HEADER-->
<header class="header__acount">
    <h1>ESPACE ADMINISTRATEUR</h1>
    <!-- <p>Bienvenue <?php echo $_SESSION['prenom']; ?></p> -->
</header>
<main class="user-account">
    <section class="menu__user-account">
        <h3>Bienvenue <?php echo $_SESSION['prenom']; ?>,</h3>
        <p> Mes informations personelles</p>
        <p> Messagerie</p>
        <p> Gestion des stocks</p>
        <p> <a href="">Gestion des clients</a></p>
        <p> Gestion des employés</p>
        <p><i class="fas fa-sign-out-alt"></i><a href="assets/php/connection/logout.php">Se déconnecter</a></p>
    </section>
    <section class="block__user-admin">
        <?php 
        if (isset($_SESSION['prenom']) && !empty($_SESSION['prenom'])) {
            // echo 'Utilisateur connecté';
            try{
                $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DATA . ';port=' . PORT . ';charset=utf8', USER, PASS);
                // Gestion des attributs de la connexion : exception et retour 
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                //Préparation de la requête : paramétrage pour eviter injection SQL
                $qry = $conn->prepare('SELECT * FROM employe');
                $qry->execute();

                $html= '<table>
                <thead>
                    <!--En tête tableau-->
                    <tr>
                        <!--Ligne du tableau-->
                        <th colspan="2">Liste des employés</th>
                        <!--Colonne du tableau-->
                    </tr>
                </thead>
                <tbody>';
                //Parcourt toutes les colonnes qu'il y a dans le résultat de la requete pour récupérer le nom des colonnes
                for($i = 0 ; $i < $qry->columnCount(); $i++){
                    $meta=$qry->getColumnMeta($i);
                    $html.='<th>'.$meta['name'].'</th>';
                }

                foreach($qry->fetchAll() as $row){
                    $html.= '<tr>';
                    //Parcourt le second array
                    foreach($row as $key => $val){
                        $html.= '<td>'.$val.'</td>';
                    }
                    $html.= '</tr>';
                }

                $html.='</tbody></table>';

                echo $html;
            }catch (PDOException $err){
                echo $err->getMessage();
            }
        } else {

        }
        ?>

    </section>
</main>
<?php
include("assets/php/template/template_bottom.php");
?>