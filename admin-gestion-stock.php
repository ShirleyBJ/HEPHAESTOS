<?php
session_start();
include("assets/php/template/template_top.php");
include("assets/php/template/template_nav.php");
include("assets/php/inc/alert.inc.php");
// alert("Connexion réussie !");
?>
<!--HEADER-->
<header class="header__acount">
    <h1>ESPACE ADMINISTRATEUR</h1>
    <!-- <p>Bienvenue <?php echo $_SESSION['prenom']; ?></p> -->
</header>
<main class="user-account">
    <?php
    include_once("assets/php/template/template_menu-user.php");
    ?>
    <section class="block__user-admin">
        <section class="user-admin__data">
            <?php
            if (isset($_SESSION['prenom']) && !empty($_SESSION['prenom'])) {
                // echo 'Utilisateur connecté';
                try {
                    // $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DATA . ';port=' . PORT . ';charset=utf8', USER, PASS);
                    // // Gestion des attributs de la connexion : exception et retour 
                    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                    //Préparation de la requête : paramétrage pour eviter injection SQL
                    $qry = $conn->prepare('SELECT * FROM produit');
                    $qry->execute();

                    $html = '<table class= "array__manage">
                <thead>
                    <!--En tête tableau-->
                    <tr>
                        <!--Ligne du tableau-->
                        <th colspan="9">Liste des produits</th>
                        <!--Colonne du tableau-->
                    </tr>
                </thead>
                <tbody>';
                    //Parcourt toutes les colonnes qu'il y a dans le résultat de la requete pour récupérer le nom des colonnes
                    for ($i = 0; $i < $qry->columnCount(); $i++) {
                        $meta = $qry->getColumnMeta($i);
                        $html .= '<th>' . $meta['name'] . '</th>';
                    }

                    foreach ($qry->fetchAll() as $row) {
                        $html .= '<tr>';
                        //Parcourt le second array
                        foreach ($row as $key => $val) {
                            $html .= '<td>' . $val . '</td>';
                        }
                        $html .= '</tr>';
                    }

                    $html .= '</tbody></table>';

                    echo $html;
                } catch (PDOException $err) {
                    echo $err->getMessage();
                }
            } else {
                header('location:page5.php');
            }
            ?>
        </section>
    </section>
</main>
<?php
include("assets/php/template/template_bottom.php");
?>