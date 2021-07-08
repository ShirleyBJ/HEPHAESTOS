    <?php
        include("assets/php/template/template_top.php");
        include("assets/php/template/template_nav.php");
    ?>
    <!--HEADER-->
    <header class="header_suscribe">
        <h1>Bienvenue à Hephaestos</h1>
        <p>Rejoignez nous !</p>
    </header>
    <main>
        <section class="block-suscribe">
            <form  action="assets/php/connection/register.php" method="post" class="form-suscribe" name="formSuscribe" id="register" >
                <h2>Formulaire d'inscription</h2>
                <div class="block-suscribe__npt--style">
                    <label for ="civilite"> Civilité:</label>
                    <select name="civilite" id="civilite"  class="suscribe-select__style" required>
                        <option value="default" disabled selected>Choisir...</option>
                        <option value="Mme">Mme.</option>
                        <option value="Mr">Mr.</option>
                    </select>
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="lastName" class="align-start"> Nom : </label>
                    <input type="text" name="lastName" id="lastName" class="align-end" required>
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="firstName" class="align-start"> Prénom : </label>
                    <input type="text" name="firstName" id="firstName" class="align-end" required>
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="adress">Adresse : </label>
                    <input type="text" name="adress" id="adress" required>
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="CP">CP : </label>
                    <input type="text" name="CP" id="CP" required>
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="ville">Ville : </label>
                    <input type="text" name="ville" id="ville" required>
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="tel">Téléphone : </label>
                    <input type="tel" name="tel" id="tel" required>
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="mail">Email : </label>
                    <input type="email" name="mail" id="mail" required>
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="pswd"> Mot de passe : </label>
                    <input type="password" name="pswd" id="pswd" required>
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="pswdValidate"> Valider MDP : </label>
                    <input type="password" id="pswdValidate" required>
                </div>
                <input type="submit" value="S'inscrire" id="btnValidate">
            </form>
        </section>
    </main>
    <script src="assets/js/checkValue.js" defer></script>
    <?php
    include('assets/php/template/template_bottom.php');
    ?>

    <!--TODO: Ajouter verification MDP, pattern au mdp et required au champs nécessaire->