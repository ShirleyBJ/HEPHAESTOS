    <?php
    include("assets/php/template/template_top.php");
    include("assets/php/template/template_nav.php");
    ?>
    <!--HEADER-->
    <header class="header_accueil">
        <h1 class="title__accueil"> HEPHAESTOS</h1>
        <p>Plus qu'un garage, une famille.</p>
    </header>
    <!--MAIN-->
    <main>
        <section class="Us_Container">
            <article>
                <h2>A propos d'Hephaestos</h2>
                <p> Mauris sed purus a nulla luctus porta a pharetra odio. Praesent molestie purus mauris,
                    vitae rutrum erat tempus nec. Vivamus euismod non dui eget ullamcorper. Etiam
                    ullamcorper sagittis efficitur. Orci varius natoque penatibus et magnis dis parturient
                    montes, nascetur ridiculus mus. Maecenas pellentesque, nulla eu imperdiet suscipit,
                    dui risus aliquam orci, quis faucibus metus orci vitae enim. Pellentesque in mattis
                    dolor. </p>
                <p>Mauris sed purus a nulla luctus porta a pharetra odio. Praesent molestie purus mauris,
                    vitae rutrum erat tempus nec. Vivamus euismod non dui eget ullamcorper. Etiam
                    ullamcorper sagittis efficitur. Orci varius natoque penatibus et magnis dis parturient
                    montes, nascetur ridiculus mus. Maecenas pellentesque, nulla eu imperdiet suscipit,
                    dui risus aliquam orci, quis faucibus metus orci vitae enim. Pellentesque in mattis
                    dolor. </p>
            </article>
            <img src="assets/img/garage.jpg" alt="garage" class="mobile-hidden">
        </section>
        <!--Block Aside-->
        <aside>
            <article class="aside_evenement">
                <h2>Èvenement</h2>
                <ul>
                    <li> 26.01 : Nunc mollis nisl ut ligula rhoncus accumsan. </li>
                    <li> 22.20 : Nullam fringilla massa eu pharetra dignissim.</li>
                    <li> 15.04 : Donec dignissim sapien id sapien tristique,id efficitur </li>
                    <li> 19.06 : Etiam blandit nibh sit amet sapien gravida,nec maximus</li>
                    <li> 05.10 : Nulla eleifend orci id elit aliquet vestibulum. </li>
                </ul>
            </article>
            <article class="aside_nouveaute">
                <h2>Nouveautés</h2>
                <ul>
                    <li>Etiam sed augue rhoncus, venenatis dolor ut, suscipit metus. </li>
                    <li> Aliquam sed leo quis nisl vulputate consectetur id in diam. </li>
                    <li> Nullam suscipit sapien vitae pellentesque porta. </li>
                    <li> Nam vitae velit vitae sem tincidunt interdum amet maximus.</li>
                    <li> In a enim porttitor nisl auctor faucibus. </li>
                </ul>
            </article>
        </aside>
        <!--MODAL BOX - AJAX-->
        <a href="#modal1" class="js-modal" id="link__modal-open"><i class="fas fa-car"></i> Infos traffic</a>
        <aside id="modal1" class="modal" aria-hidden="true" role="dialog" aria-labelledby="titlemodal" style="display:none;">
            <div class="modal-wrapper js-modal-stop">
                <button class="js-modal-close link__modal-close"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <div class="logo_interSection">
                    <h1 class="modal__title">Traffic routier en temps réel</h1>
                </div>
                <div class="block__display-map">
                    <img src="https://www.mapquestapi.com/staticmap/v5/map?key=s4w3dJJw5XazzZ1x1v9EU8xjg4rI5DGG&center=49.4179497,2.8263171&zoom=12&traffic=flow|cons|inc" alt="carte routiere de compiegne">
                </div>
                <div class="block__display-data">
                </div>
            </div>
        </aside>
        <!--Block inter-section récurrent-->
        <div class="logo_interSection">
            <h2>Nos Prestations</h2>
        </div>
        <!--Block presta-->
        <section class="block_prestation">
            <article class="fix">
                <h2>Réparation / Maintenance auto </h2>
                <img src="assets/img/engine.jpg" alt="vue d'un moteur avec capot ouvert">
                <p>Aenean convallis mi erat, vel ullamcorper nibh lacinia
                    vel. Vestibulum ornare odio sed velit dignissim
                    placerat. Aenean at iaculis massa, dignissim dapibus
                    nibh. Fusce sed leo eu eros euismod tempus. Proin
                    molestie dapibus pellentesque. Fusce tempor lacinia ex
                    in efficitur. Maecenas vitae eleifend sapien. Nunc
                    luctus suscipit lectus. Morbi et nunc efficitur, porttitor
                    neque in, aliquet arcu. Vivamus tristique lorem ac
                    consequat posuere. Cras vitae felis id enim fringilla
                    accumsan a nec justo. Aenean sit amet venenatis urna,
                    ut placerat urna. Curabitur nisl ex, laoreet eu
                    vestibulum non, sodales vel mauris. Donec magna
                    lectus, dignissim a quam sit amet, iaculis mollis sapien.
                </p>
                <div class="button"><a href="page2.html#fix">En savoir plus </a></div>
            </article>
            <article class="repair">
                <h2>Dépannage automobile</h2>
                <img src="assets/img/severalCar.jpg" alt="plusieurs voiture d'époque trés coloré">
                <p>Aenean convallis mi erat, vel ullamcorper nibh lacinia
                    vel. Vestibulum ornare odio sed velit dignissim
                    placerat. Aenean at iaculis massa, dignissim dapibus
                    nibh. Fusce sed leo eu eros euismod tempus. Proin
                    molestie dapibus pellentesque. Fusce tempor lacinia ex
                    in efficitur. Maecenas vitae eleifend sapien. Nunc
                    luctus suscipit lectus. Morbi et nunc efficitur, porttitor
                    neque in, aliquet arcu. Vivamus tristique lorem ac
                    consequat posuere. Cras vitae felis id enim fringilla
                    accumsan a nec justo. Aenean sit amet venenatis urna,
                    ut placerat urna. Curabitur nisl ex, laoreet eu
                    vestibulum non, sodales vel mauris. Donec magna
                    lectus, dignissim a quam sit amet, iaculis mollis sapien.
                </p>
                <div class="button"><a href="page2.html#repair">En savoir plus</a></div>
            </article>
            <article class="sell">
                <h2>Achat et revente de véhicule</h2>
                <img src="assets/img/whiteCar.jpg" alt=" voiture blanche">
                <p>Aenean convallis mi erat, vel ullamcorper nibh lacinia
                    vel. Vestibulum ornare odio sed velit dignissim
                    placerat. Aenean at iaculis massa, dignissim dapibus
                    nibh. Fusce sed leo eu eros euismod tempus. Proin
                    molestie dapibus pellentesque. Fusce tempor lacinia ex
                    in efficitur. Maecenas vitae eleifend sapien. Nunc
                    luctus suscipit lectus. Morbi et nunc efficitur, porttitor
                    neque in, aliquet arcu. Vivamus tristique lorem ac
                    consequat posuere. Cras vitae felis id enim fringilla
                    accumsan a nec justo. Aenean sit amet venenatis urna,
                    ut placerat urna. Curabitur nisl ex, laoreet eu
                    vestibulum non, sodales vel mauris. Donec magna
                    lectus, dignissim a quam sit amet, iaculis mollis sapien.
                </p>
                <div class="button"><a href="page2.html#sell">En savoir plus</a></div>
            </article>
            <article class="renew">
                <h2>Rénovation de véhicule</h2>
                <img src="assets/img/oldCar.jpg" alt="voiture en mauvais état dans un atelier garagiste">
                <p>Aenean convallis mi erat, vel ullamcorper nibh lacinia
                    vel. Vestibulum ornare odio sed velit dignissim
                    placerat. Aenean at iaculis massa, dignissim dapibus
                    nibh. Fusce sed leo eu eros euismod tempus. Proin
                    molestie dapibus pellentesque. Fusce tempor lacinia ex
                    in efficitur. Maecenas vitae eleifend sapien. Nunc
                    luctus suscipit lectus. Morbi et nunc efficitur, porttitor
                    neque in, aliquet arcu. Vivamus tristique lorem ac
                    consequat posuere. Cras vitae felis id enim fringilla
                    accumsan a nec justo. Aenean sit amet venenatis urna,
                    ut placerat urna. Curabitur nisl ex, laoreet eu
                    vestibulum non, sodales vel mauris. Donec magna
                    lectus, dignissim a quam sit amet, iaculis mollis sapien.
                </p>
                <div class="button"><a href="page3.html#renew"> En savoir plus</a></div>
            </article>
        </section>
        <!--Block inter-section récurrent-->
        <div class="logo_interSection">
            <h2>Nos Rénovations</h2>
        </div>
        <!--Block picture reno-->
        <div class="img_reno">
            <img src="assets/img/greenCar.jpg" alt="voiture verte décapotable">
            <img src="assets/img/redCarTire.jpg" alt="voiture rouge zoom pneu">
            <img src="assets/img/greyCar.jpg" alt="voiture grise">
        </div>
        <!--Block newsletter-->
        <section class="newsletter">
            <div class="newsletter_txt">
                <p>Inscrivez vous à notre newsletter</p>
                <p>Vous souhaitez être notifié de toutes les nouveautés ? Inscrivez vous !</p>
            </div>
            <form action="action.php">
                <input type="email" name="mail" id="mail" placeholder="Entrez votre email...">
            </form>
        </section>
    </main>

    <?php
    include("assets/php/template/template_bottom.php");
    ?>