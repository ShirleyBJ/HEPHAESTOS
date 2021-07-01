    <?php
        include("assets/php/template/template_top.php");
        include("assets/php/template/template_nav.php");
        include_once("assets/php/inc/connection.inc.php");
        
        try{
        $conn = connection();
        $qry = $conn->prepare('SELECT nom_produit,prix_unitaire,img_produit FROM produit');
        $qry->execute();
        $row=$qry->fetchAll();
        } catch(PDOException $err){
            $err->getMessage();
        }
    ?>
    <!--HEADER-->
    <header class="header_product">
        <h1 class="title__product">NOS PRODUITS</h1>
    </header>
    <!--MAIN-->
    <main class="main_product">
        <div class="product__container">
            <section class="main__product-section">
                <div class="product-section">
                    <?php
                        $html="";
                        for ($i=0; $i < sizeof($row); $i++) {
                            $html.="<div class=\"product__card\">
                            <div class=\"product__img\">
                                <img src=\"assets/img/". $row[$i]['img_produit']."\" alt=\"image d'une roue\" class=\"product__img--size\">
                            </div>";

                                $html.= "<h5 class=\"product__title\">". $row[$i]['nom_produit']."</h5>";

                                $html.= "<div class=\"product__price\">
                                Prix : <span class=\"prix-unitaire\">".$row[$i]['prix_unitaire']." € </span>
                            </div>";
                                $html.=  "<div class=\"product__btn\">
                                <button class=\"btn__reserved\">Réserver</button>
                            </div>
                        </div>";
                        }
                        echo $html;
                    ?>
                    </div>
            </section>
            <aside class="aside-product">
                <div class="aside-container">
                    <section class="aside-container__search-product">
                        <!--Recherche element via fichier php-->
                        <form action=""></form>
                        <input type="text" name="" id="" placeholder="Rechercher" class="npt__search-product">
                        <button class="btn__search-product"><i class="fa fa-search"></i></button>
                    </section>
                    <section class="aside__product-category">
                        <h5 class="aside-product__title">Catégorie</h5>
                        <div class="product-category">
                            <input type="radio" id="" name="" value="">Tous les produits</input>
                            <label for=""></label>
                        </div>
                        <div class="product-category">
                            <input type="radio" id="" name="" value="">Entretien courant</input>
                        <label for=""></label>
                        </div>
                        <div class="product-category">
                            <input type="radio" id="" name="" value="">Entretien mécanique</input>
                        <label for=""></label>
                        </div>
                        <div class="product-category">
                            <input type="radio" id="" name="" value="">Outillage</input>
                        <label for=""></label>
                        </div>
                    </section>
                    <section class="aside-container__filter-price">
                        <h5 class="aside-product__title">Filtrer par Prix</h5>
                        <div class="filter-price--centered">
                            <input type="range" id="" name="" min="0" max="">
                            <label for="volume"></label>
                        </div>
                        <div class="filter-check--space">
                            <input type="checkbox" id="" name="">
                            <label for="">$0 - $50</label>
                        </div>
                        <div class="filter-check--space">
                            <input type="checkbox" id="" name="">
                            <label for="">$50 - $100</label>
                        </div>
                        <div class="filter-check--space">
                            <input type="checkbox" id="" name="">
                            <label for="">$100 +</label>
                        </div>
                    </sectio>
                </div>
            </aside>
        </div>
    </main>
    <?php
    include("assets/php/template/template_bottom.php");
    ?>