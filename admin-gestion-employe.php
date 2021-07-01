<?php
session_start();
include("assets/php/template/template_top.php");
include("assets/php/template/template_nav.php");
include("assets/php/inc/alert.inc.php");
// alert("Connexion réussie !");
?>
<!--HEADER-->
<?php  
    include_once("assets/php/template/template_header-user.php");
?>
<main class="user-account">
    <?php
    include_once("assets/php/template/template_menu-user.php");
    ?>
    <section class="block__user-admin">
        <section class="user-admin__employe">
            <?php
            if (isset($_SESSION['prenom']) && !empty($_SESSION['prenom'])) {
                // echo 'Utilisateur connecté';
                try {
                    //TODO: Voir pourquoi pas nécessaire de rappeler $conn
                    // $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DATA . ';port=' . PORT . ';charset=utf8', USER, PASS);
                    // // Gestion des attributs de la connexion : exception et retour 
                    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                    //Préparation de la requête : paramétrage pour eviter injection SQL
                    $qry = $conn->prepare('SELECT numero_employe,nom,prenom,adresse,cp,ville,telephone,email,date_naissance,fonction,rend_compte,date_embauche, date_fin_contrat 
                    FROM employe');
                    $qry->execute();

                    $html = '<table class= "array__manage array__employe">
                    <thead>
                        <!--En tête tableau-->
                        <tr>
                            <!--Ligne du tableau-->
                            <th colspan="14">Liste des employés</th>
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