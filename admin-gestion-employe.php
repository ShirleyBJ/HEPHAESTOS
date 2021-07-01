<?php
session_start();
include("assets/php/template/template_top.php");
include("assets/php/template/template_nav.php");
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
        <!--SECTION CRUD of table employe-->
            <section class="user-admin__btn-crud">
            <button href="#modal1" class="js-modal"> Ajouter un client </button>
            <button>Modifier une fiche employé</button>
            <button>Supprimer un employé</button>
        </section>
        <!--MODAL BOX - AJAX-->
        <aside id="modal1" class="modal" aria-hidden="true" role="dialog" aria-labelledby="titlemodal" style="display:none;">
            <div class="modal-wrapper js-modal-stop">
                <button class="js-modal-close link__modal-close"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <div class="logo_interSection">
                    <h1 class="modal__title">Ajouter un employé</h1>
                </div>
                <form action="" method="post" id="register" class="admin-create-employe__modal">
                <div class="user-admin__info--spacing">
                    <label for ="civilite"> Civilité:</label>
                    <select name="civilite" id="civilite">
                        <option value="Choisir" disabled selected>Choisir...</option>
                        <option value="Mme">Mme</option>
                        <option value="Mr">Mr</option>
                    </select required>
                </div>
                <div class="user-admin__info--spacing">
                    <label for="lastName"> Nom : </label>
                    <input type="text" name="lastName" id="lastName" required>
                </div>
                <div class="user-admin__info--spacing">
                    <label for="firstName" > Prénom : </label>
                    <input type="text" name="firstName" id="firstName" required>
                </div>
                <div class="user-admin__info--spacing">
                    <label for="adress">Adresse : </label required>
                    <input type="text" name="adress" id="adress" required>
                </div>
                <div class="user-admin__info--spacing">
                    <label for="CP">CP : </label>
                    <input type="text" name="CP" id="CP" required>
                </div>
                <div class="user-admin__info--spacing">
                    <label for="ville">Ville : </label>
                    <input type="text" name="ville" id="ville" required>
                </div>
                <div class="user-admin__info--spacing">
                    <label for="tel">Téléphone : </label>
                    <input type="tel" name="tel" id="tel" required>
                </div>
                <div class="user-admin__info--spacing">
                    <label for="email">Email : </label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="user-admin__info--spacing">
                    <label for="pswd"> Mot de passe : </label>
                    <input type="password" name="pswd" id="pswd" required>
                </div>
                <div class="user-admin__info--spacing">
                    <label for="pswdValidate"> Confirmer le mot de passe: </label>
                    <input type="password" id="pswdValidate" required>
                </div>
                <input type="submit" value="Ajouter">
            </form>
            </div>
        </aside>
    </section>
</main>
<?php
include("assets/php/template/template_bottom.php");
?>