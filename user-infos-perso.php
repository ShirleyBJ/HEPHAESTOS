<?php
session_start();
include_once("assets/php/template/template_top.php");
include_once("assets/php/template/template_nav.php");
include_once("assets/php/inc/alert.inc.php");
include_once("assets/php/inc/connection.php");
//TODO: Vérifier d'ou provient la variable et afficher infos en fonction client/employes
if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    $email = $_SESSION['email'];
    try{
        $conn = connection();
        //Préparation de la requête: paramétrage poour éviter injection sql
        $sql = 'SELECT * FROM client WHERE email=?';
        $qry = $conn->prepare($sql);
        //Exécution de la requête
        $qry->execute(array($email));
        $row=$qry->fetch();
        // echo '<pre>';
        // var_dump($row);
        // echo '</pre>';
        if(!empty($row)){
            $lastName =  $row['nom'];
            $firstName = $row['prenom'];
            $adress = $row['adresse'];
            $cp = $row['CP']; //attention, CP est maj et dans la BDD apparait en min.
            $city = $row['ville'];
            $phone = $row['telephone'];
            $mail = $row['email'];
            $pswd = $row['mot_de_passe'];
        }
        //Test contenu des variable
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
}
?>
<!--HEADER-->
<header class="header__acount">
    <h1>ESPACE ADMINISTRATEUR</h1>
    <!-- <p>Bienvenue <?php echo $_SESSION['prenom']; ?></p> -->
</header>
<main class="user-account">
    <?php
    include_once("assets/php/template/template_menu-admin.php");
    ?>
    <section class="block__user-admin">
        <section class="user-admin user-admin__info">
            <form action="user-infos-perso.php" method="post">
                <h2>Mes informations personelles</h2>
                <div>
                    <label for ="civilite"> Civilité:</label>
                    <select name="civilite" id="civilite">
                        <option value="default" disabled selected>Choisir...</option>
                        <option value="Mme">Mme.</option>
                        <option value="Mr">Mr.</option>
                    </select>
                </div>
                <div>
                    <label for="lastName"> Nom : </label>
                    <input type="text" name="lastName" id="lastName" value="<?php echo $lastName;?>">
                </div>
                <div>
                    <label for="firstName" > Prénom : </label>
                    <input type="text" name="firstName" id="firstName" value="<?php echo $firstName;?>">
                </div>
                <div>
                    <label for="adress">Adresse : </label>
                    <input type="text" name="adress" id="adress" value="<?php echo $adress;?>">
                </div>
                <div>
                    <label for="CP">CP : </label>
                    <input type="text" name="CP" id="CP" value="<?php echo $cp;?>">
                </div>
                <div>
                    <label for="ville">Ville : </label>
                    <input type="text" name="ville" id="ville" value="<?php echo $city;?>">
                </div>
                <div class="">
                    <label for="tel">Téléphone : </label>
                    <input type="tel" name="tel" id="tel" value="<?php echo $phone;?>">
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="email">Email : </label>
                    <input type="email" name="email" id="email" value="<?php echo $mail;?>">
                </div>
                <div>
                    <label for="pswd"> Mot de passe : </label>
                    <input type="password" name="pswd" id="pswd" value="<?php echo $pswd;?>">
                </div>
                <input type="submit" value="Modifier">
            </form>
        </section>
    </section>
</main>
<?php
include("assets/php/template/template_bottom.php");
?>