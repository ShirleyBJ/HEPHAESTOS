<?php
session_start();
include("assets/php/template/template_top.php");
include("assets/php/template/template_nav.php");
include("assets/php/inc/alert.inc.php");
// alert("Connexion réussie !");
?>
<!--HEADER-->
<!--HEADER-->
<?php  
    include_once("assets/php/template/template_header-user.php");
?>
</header>
<main class="user-account">
    <?php
    include_once("assets/php/template/template_menu-user.php");
    ?>
    <section class="block__user-admin">
        <section class="user-admin">
            <?php
            if (isset($_SESSION['prenom']) && !empty($_SESSION['prenom'])) {
                // echo 'Utilisateur connecté';
                try {
                    //Préparation de la requête : paramétrage pour eviter injection SQL
                    $qry = $conn->prepare('SELECT numero_client,civilite,nom,prenom,adresse,cp,ville,telephone,email
                FROM client');
                    $qry->execute();

                    $html = '<table class= "array__manage">
                <thead>
                    <!--En tête tableau-->
                    <tr>
                        <!--Ligne du tableau-->
                        <th colspan="10">Liste des clients</th>
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
            <button href="#modal2" class="js-modal"> Ajouter un client </button>
            <button id ="modify-employe">Modifier une fiche client</button>
            <button id="delete-employe">Supprimer un client</button>
        </section>
        <section id="block_delete--hidden">
            <form action="assets/php/utils/delete-user.php" method="post">
                <label for="id">Saisir l'identifiant du client à supprimer</label>
                <input type="number" name="id" id="id">
                <button type="submit" id="validate-btn">Valider</button>
            </form>
        </section>
        <section id="block_modify--hidden">
            <form action="admin-modify-employe.php" method="post">
                <label for="id">Saisir l'identifiant du client à modifier</label>
                <input type="number" name="id" id="id">
                <button type=submit id="validate-btn">Valider</button>
            </form>
        </section>
        <!--MODAL BOX - ADD EMPLOYE-->
        <aside id="modal2" class="modal" aria-hidden="true" role="dialog" aria-labelledby="titlemodal" style="display:none;">
            <div class="modal-wrapper js-modal-stop">
                <button class="js-modal-close link__modal-close"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <div class="logo_interSection">
                    <h1 class="modal__title">Ajouter un client</h1>
                </div>
                <form action="assets/php/connection/register.php" method="post" id="register" class="admin-create-employe__modal">
                <div class="user-admin__info--spacing">
                    <label for ="civilite"> Civilité:</label>
                    <select name="civilite" id="civilite">
                        <option value="Choisir" disabled selected>Choisir...</option>
                        <option value="Mme">Mme</option>
                        <option value="Mr">Mr</option>
                    </select>
                </div>
                <div class="user-admin__info--spacing">
                    <label for="lastName"> Nom : </label>
                    <input type="text" name="lastName" id="lastName">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="firstName" > Prénom : </label>
                    <input type="text" name="firstName" id="firstName">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="adress">Adresse : </label>
                    <input type="text" name="adress" id="adress">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="CP">CP : </label>
                    <input type="text" name="CP" id="CP">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="ville">Ville : </label>
                    <input type="text" name="ville" id="ville">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="tel">Téléphone : </label>
                    <input type="tel" name="tel" id="tel">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="mail">Email : </label>
                    <input type="email" name="mail" id="mail">
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="pswd"> Mot de passe : </label>
                    <input type="password" name="pswd" id="pswd" required>
                </div>
                <input type="submit" value="Ajouter">
            </form>
            </div>
        </aside>
    </section>
    <script src="assets/js/hideBlock.js" defer></script>
    <script src="assets/js/modal.js" defer></script>
</main>
<?php
include("assets/php/template/template_bottom.php");
?>