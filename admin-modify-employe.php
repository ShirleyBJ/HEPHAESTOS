<?php
session_start();
include_once("assets/php/template/template_top.php");
include_once("assets/php/template/template_nav.php");
include_once("assets/php/inc/connection.inc.php");

$id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
try {
    $conn = connection();
    //Récupérer des données de l'employé pour affichage dans la boite modal
    $sql = 'SELECT * FROM employe WHERE numero_employe=' . $id;
    $qry = $conn->prepare($sql);
    //Exécution de la requete
    $qry->execute(array($email));
    $row = $qry->fetch();

    if (!empty($row)) {
        $id = $row['numero_employe'];
        $civilite = $row['civilite'];
        $lastName = $row['nom'];
        $firstName = $row['prenom'];
        $adress = $row['adresse'];
        $cp = $row['CP']; //attention, CP est maj et dans la BDD apparait en min.
        $city = $row['ville'];
        $phone = $row['telephone'];
        $mail = $row['email'];
        $pswd = $row['mot_de_passe'];
        $dob = $row['date_naissance'];
        $fonction = $row['fonction'];
        $superieur = $row['rend_compte'];
        $hired = $row['date_embauche'];
        $fired = $row['date_fin_contrat'];
    } else {
        //TODO: Affichage d'un message d'erreur côté client
        echo 'Aucune correspondance';
    }
    // unset($id);
    unset($conn);
} catch (PDOException $err) {
    echo $err->getMessage();
}
?>
<!--HEADER-->
<?php
include_once("assets/php/template/template_header-user.php");
?>
<!-- <p>Bienvenue <?php echo $_SESSION['prenom']; ?></p> -->
</header>
<main class="user-account">
    <?php
    include_once("assets/php/template/template_menu-user.php");
    ?>
    <section class="block__user-admin">
        <form action="assets/php/utils/admin_update-data-employe.php" method="post" id="register" class="user-admin__form-modify">
            <h2>Modifier fiche employé</h2>
            <div class="admin-modify-user">
                <div>
                    <div class="user-admin__info--spacing">
                        <label for="id"> Identifiant employe: </label>
                        <input type="text" name="id" id="id" value="<?php echo $id; ?>">
                    </div>
                    <div class="user-admin__info--spacing">
                        <label for="civilite"> Civilité:</label>
                        <select name="civilite" id="civilite">
                            <option value="<?php if ($civilite == "Mme") {
                                                echo "Mme";
                                            } elseif ($civilite == "Mr") {
                                                echo "Mr";
                                            } ?>" selected>
                                <?php
                                if ($civilite == "Mme") {
                                    echo "Mme";
                                } elseif ($civilite == "Mr") {
                                    echo "Mr";
                                }
                                ?>
                            </option>
                            <option value="<?php if ($civilite == "Mme") {
                                                echo "Mr";
                                            } elseif ($civilite == "Mr") {
                                                echo "Mme";
                                            } ?>">
                                <?php
                                if ($civilite == "Mme") {
                                    echo "Mr";
                                } elseif ($civilite == "Mr") {
                                    echo "Mme";
                                }
                                ?>
                            </option>
                        </select>
                    </div>
                    <div class="user-admin__info--spacing">
                        <label for="lastName"> Nom : </label>
                        <input type="text" name="lastName" id="lastName" value="<?php echo $lastName; ?>">
                    </div>
                    <div class="user-admin__info--spacing">
                        <label for="firstName"> Prénom : </label>
                        <input type="text" name="firstName" id="firstName" value="<?php echo $firstName; ?>">
                    </div>
                    <div class="user-admin__info--spacing">
                        <label for="adress">Adresse : </label>
                        <input type="text" name="adress" id="adress" value="<?php echo $adress; ?>">
                    </div>
                    <div class="user-admin__info--spacing">
                        <label for="CP">CP : </label>
                        <input type="text" name="CP" id="CP" value="<?php echo $cp; ?>">
                    </div>
                    <div class="user-admin__info--spacing">
                        <label for="ville">Ville : </label>
                        <input type="text" name="ville" id="ville" value="<?php echo $city; ?>">
                    </div>
                    <div class="user-admin__info--spacing">
                        <label for="tel">Téléphone : </label>
                        <input type="tel" name="tel" id="tel" value="<?php echo $phone; ?>">
                    </div>

                </div>
                <div>
                    <div class="user-admin__info--spacing">
                        <label for="email">Email : </label>
                        <input type="email" name="email" id="email" value="<?php echo $mail; ?>">
                    </div>
                    <div class="user-admin__info--spacing">
                        <label for="dob"> Date de naissance </label>
                        <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>">
                    </div>
                    <div class="user-admin__info--spacing">
                        <label for="fonction"> Fonction</label>
                        <input type="text" id="fonction" name="fonction" value="<?php echo $fonction; ?>">
                    </div>
                    <div class="user-admin__info--spacing">
                        <label for="supérieur"> Supérieur hiérarchique</label>
                        <select name="superieur" id="supérieur">
                            <option value="<?php echo $superieur; ?>" selected><?php echo $superieur; ?></option>
                        </select>
                    </div>
                    <div class="user-admin__info--spacing">
                        <label for="dEmbauche"> Date d'embauche</label>
                        <input type="date" id="dEmbauche" name="dEmbauche" value="<?php echo $hired; ?>">
                    </div>
                    <div class="user-admin__info--spacing">
                        <label for="dFinContrat"> Date de fin de contrat</label>
                        <input type="date" id="dFinContrat" name="dFinContrat" value="<?php echo $fired; ?>">
                    </div>
                    <div>
                        <input type="submit" value="Modifier" class="">
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>
<script src="assets/js/checkValue.js" defer></script>
<?php
include("assets/php/template/template_bottom.php");
?>