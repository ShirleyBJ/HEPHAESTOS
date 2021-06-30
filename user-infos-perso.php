<?php
session_start();
include_once("assets/php/template/template_top.php");
include_once("assets/php/template/template_nav.php");
include_once("assets/php/inc/connection.inc.php");
include_once("assets/php/inc/whoIsConnected.inc.php");

//Vérifie qu'on a bien une variable de session active - user connecté
if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    $email = $_SESSION['email'];
    $user = whoIsConnected($email);
    try{
        $conn = connection();
        //Préparation de la requête: paramétrage pour éviter injection sql
        //En fonction du user connecté, la requete sql change
        if($user == 'Employe'){
            $sql = 'SELECT * FROM employe WHERE email=?';
        } else{
            $sql = 'SELECT * FROM client WHERE email=?';
        }
        
        $qry = $conn->prepare($sql);
        //Exécution de la requête
        $qry->execute(array($email));
        $row=$qry->fetch();
        // echo '<pre>';
        // var_dump($row);
        // echo '</pre>';
        //Si le retour n'est pas vide alors on récupére les données
        if(!empty($row)){
            $civilite = $row['civilite'];
            $lastName =  $row['nom'];
            $firstName = $row['prenom'];
            $adress = $row['adresse'];
            $cp = $row['CP']; //attention, CP est maj et dans la BDD apparait en min.
            $city = $row['ville'];
            $phone = $row['telephone'];
            $mail = $row['email'];
            $pswd = $row['mot_de_passe'];
        }
        //Test contenu des variables
        // echo $civilite;
        // echo $lastName; 
        // echo $firstName; 
        // echo $adress; 
        // echo $cp; 
        // echo $city; 
        // echo $phone; 
        // echo $mail; 
        // echo $pswd; 
    }catch(PDOException $err){
        echo $err->getMessage();
    }
} else{
    header('location : page5.php');
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
        <section class="user-admin user-admin__info">
            <form action="assets/php/utils/update_data.php" method="post" id="register">
                <h2>Mes informations personelles</h2>
                <!-- <h3>
                    <?php echo $user; ?>
                </h3> -->
                <div class="user-admin__info--spacing">
                    <label for ="civilite"> Civilité:</label>
                    <select name="civilite" id="civilite">
                        <option value="<?php if($civilite=="Mme"){echo "Mme";}elseif($civilite == "Mr"){
                                    echo "Mr";
                                } ?>" selected>
                            <?php
                                if($civilite == "Mme"){
                                    echo "Mme";
                                } elseif($civilite == "Mr"){
                                    echo "Mr";
                                }
                            ?>
                        </option required>
                        <option value="<?php if($civilite=="Mme"){echo "Mr";}elseif($civilite == "Mr"){
                                    echo "Mme";
                                }?>">
                            <?php
                                if($civilite == "Mme"){
                                    echo "Mr";
                                } elseif($civilite == "Mr"){
                                    echo "Mme";
                                }
                            ?>
                        </option>
                    </select>
                </div>
                <div class="user-admin__info--spacing">
                    <label for="lastName"> Nom : </label>
                    <input type="text" name="lastName" id="lastName" value="<?php echo $lastName;?>">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="firstName" > Prénom : </label>
                    <input type="text" name="firstName" id="firstName" value="<?php echo $firstName;?>">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="adress">Adresse : </label>
                    <input type="text" name="adress" id="adress" value="<?php echo $adress;?>">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="CP">CP : </label>
                    <input type="text" name="CP" id="CP" value="<?php echo $cp;?>">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="ville">Ville : </label>
                    <input type="text" name="ville" id="ville" value="<?php echo $city;?>">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="tel">Téléphone : </label>
                    <input type="tel" name="tel" id="tel" value="<?php echo $phone;?>">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="email">Email : </label>
                    <input type="email" name="email" id="email" value="<?php echo $mail;?>">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="pswd"> Mot de passe : </label>
                    <input type="password" name="pswd" id="pswd" value="<?php echo $pswd;?>">
                </div>
                <div class="user-admin__info--spacing">
                    <label for="pswdValidate"> Confirmer le mot de passe: </label>
                    <input type="password" id="pswdValidate" value="<?php echo $pswd;?>">
                </div>
                <input type="submit" value="Modifier">
            </form>
        </section>
    </section>
</main>
<script src="assets/js/checkValue.js" defer></script>
<?php
include("assets/php/template/template_bottom.php");
?>