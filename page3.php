    <?php
        include("assets/php/template/template_top.php");
        include("assets/php/template/template_nav.php");
    ?>
    <!--HEADER-->
    <header class="header_reno">
        <h1>RENOVATION AUTOMOBILE</h1>
    </header>
    <!--Block inter-section récurrent-->
    <div class="logo_interSection">
        <h2>Notre équipe de profesionnel</h2>
    </div>
    <!--MAIN-->
    <main>
        <div class="main_reno">
            <!--BLOCK PORFOLIO EQUIPE-->
            <section class="blockPortfolio">
                <article class="portfolio">
                    <div>
                        <img src="assets/img/elijah.jpg" alt="photo homme noir">
                        <p class="firstName">Elijah</p>
                        <p>Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. In non eros imperdiet felis
                            condimentum facilisis id in felis. Nulla ante
                            diam, fringilla in leo non, sagittis placerat
                            risus. Pellentesque at velit in tellus
                            pellentesque dignissim in eget ex. Duis ut
                            erat id nisl suscipit feugiat ut non tellus.
                            Nulla interdum porta nisi, id consectetur elit.</p>
                    </div>
                </article>
                <article class="portfolio">
                    <div>
                        <img src="assets/img/maze.jpg" alt="photo femme noir">
                        <p class="firstName">Maze</p>
                        <p>Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. In non eros imperdiet felis
                            condimentum facilisis id in felis. Nulla ante
                            diam, fringilla in leo non, sagittis placerat
                            risus. Pellentesque at velit in tellus
                            pellentesque dignissim in eget ex. Duis ut
                            erat id nisl suscipit feugiat ut non tellus.
                            Nulla interdum porta nisi, id consectetur elit.</p>
                    </div>
                </article>
                <article class="portfolio">
                    <div>
                        <img src="assets/img/damon.jpg" alt="photo homme noir">
                        <p class="firstName">Damon</p>
                        <p>Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. In non eros imperdiet felis
                            condimentum facilisis id in felis. Nulla ante
                            diam, fringilla in leo non, sagittis placerat
                            risus. Pellentesque at velit in tellus
                            pellentesque dignissim in eget ex. Duis ut
                            erat id nisl suscipit feugiat ut non tellus.
                            Nulla interdum porta nisi, id consectetur elit.</p>
                    </div>
                </article>
            </section>
            <!--BlOCK AVIS-->
            <div class="comment">
                <h2 class="title">Il nous ont fait confiance</h2>
                <section class="org_comment">
                    <article class="cmt">
                        <img src="assets/img/five-stars.svg" alt="picto de 5 étoiles">
                        <p>Phasellus ligula felis, vehicula et mattis a, lacinia
                            vitae purus. Pellentesque hendrerit condimentum ex,
                            sed feugiat turpis consectetur in. Nam vitae eros et
                            urna consequat maximus eu et libero. Vivamus a
                            augue maximus, bibendum erat ut, ultrices leo. Duis
                            justo dui, accumsan ut libero nec, fringilla varius
                            massa. Donec mi ante, fringilla sit amet tincidunt a. </p>
                        <p class="bold">Lorem ipsum. </p>
                    </article>
                    <article class="cmt">
                        <img src="assets/img/five-stars.svg" alt="picto de 5 étoiles">
                        <p>Phasellus ligula felis, vehicula et mattis a, lacinia
                            vitae purus. Pellentesque hendrerit condimentum ex,
                            sed feugiat turpis consectetur in. Nam vitae eros et
                            urna consequat maximus eu et libero. Vivamus a
                            augue maximus, bibendum erat ut, ultrices leo. Duis
                            justo dui, accumsan ut libero nec, fringilla varius
                            massa. Donec mi ante, fringilla sit amet tincidunt a. </p>
                        <p class="bold">Lorem ipsum. </p>
                    </article>
                    <article class="cmt">
                        <img src="assets/img/five-stars.svg" alt="picto de 5 étoiles">
                        <p>Phasellus ligula felis, vehicula et mattis a, lacinia
                            vitae purus. Pellentesque hendrerit condimentum ex,
                            sed feugiat turpis consectetur in. Nam vitae eros et
                            urna consequat maximus eu et libero. Vivamus a
                            augue maximus, bibendum erat ut, ultrices leo. Duis
                            justo dui, accumsan ut libero nec, fringilla varius
                            massa. Donec mi ante, fringilla sit amet tincidunt a. </p>
                        <p class="bold">cLorem ipsum. </p>
                    </article>
                </section>
            </div>
            <!--Block inter-section récurrent-->
            <div class="logo_interSection">
                <h2>Nos Projets</h2>
            </div>
            <section class="img_projet">
                <img src="assets/img/greenCar.jpg" alt="voiture epoque verte">
                <img src="assets/img/twoCar.jpg" alt="deux voitures d'époque">
                <img src="assets/img/redCar.jpg" alt=" voiturer d'époque rouge">
                <img src="assets/img/volant.jpg" alt=" volantde voiture vintage">
            </section>
        </div>
        <!--Block newsletter-->
        <div class="newsletter">
            <div class="newsletter_txt">
                <p>Besoin de notre expertise ? Une question, un conseil ?</p>
                <p>N'hésitez pas et laissez-nous vos coodornnées </p>
            </div>
            <form action="action.php">
                <input type="email" name="mail" id="mail" placeholder="Entrez votre email...">
            </form>
        </div>
    </main>
    <?php
    include("assets/php/template/template_bottom.php");
    ?>