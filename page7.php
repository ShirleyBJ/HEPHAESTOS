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
            <form  action="assets/php/connection/register.php" method="post" class="form-suscribe" name="formSuscribe" >
                <h2>Formulaire d'inscription</h2>
                <div class="block-suscribe__npt--style">
                    <label for ="civilite"> Civilité:</label>
                    <select name="civilite" id="civilite"  class="suscribe-select__style">
                        <option value="default" disabled selected>Choisir...</option>
                        <option value="Mme">Mme.</option>
                        <option value="Mr">Mr.</option>
                    </select>
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="lastNameSuscribe" class="align-start"> Nom : </label>
                    <input type="text" name="lastNameSuscribe" id="lastNameSuscribe" class="align-end">
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="firstNameSuscribe" class="align-start"> Prénom : </label>
                    <input type="text" name="firstNameSuscribe" id="firstNameSuscribe" class="align-end">
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="adressSuscribe">Adresse : </label>
                    <input type="text" name="adressSuscribe" id="adressSuscribe">
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="CPSuscribe">CP : </label>
                    <input type="text" name="CPSuscribe" id="CPSuscribe">
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="villeSuscribe">Ville : </label>
                    <input type="text" name="villeSuscribe" id="villeSuscribe">
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="telSuscribe">Téléphone : </label>
                    <input type="tel" name="telSuscribe" id="telSuscribe">
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="mailSuscribe">Email : </label>
                    <input type="email" name="mailSuscribe" id="mailSuscribe_">
                </div>
                <div class="block-suscribe__npt--style">
                    <label for="pswdSuscribe"> Mot de passe : </label>
                    <input type="password" name="pswdSuscribe" id="pswdSuscribe">
                </div>
                <input type="submit" value="S'inscrire">
            </form>
        </section>
    </main>
    <?php
    include('assets/php/template/template_bottom.php');
    ?>

    <!--TODO: Ajouter verification MDP, pattern au mdp et required au champs nécessaire->