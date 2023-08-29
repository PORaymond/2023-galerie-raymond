<header class="ordinateur header-catalogue">
    <div class="logo ordinateur"></div>
        <div class="container">
            <div class="row accueil_client">
                <div class="col-auto ">
                <h1 class = "titre-site"><?php echo $titre ?></h1>
                </div>
                <div class="col">

                </div>
                <div class="col-auto ">
                <?php
                if (isset($_SESSION['utilisateurConnecte'])) {

                    if (isset($_SESSION['bienvenueClient'])) {
                        $bienvenue = $_SESSION['bienvenueClient'];
                        echo "<h5>Bienvenue</h5>";
                        echo"<h5>". $bienvenue."</h5>";



                    } elseif (isset($_SESSION['bienvenueAdmin'])) {

                        $bienvenue = $_SESSION['bienvenueAdmin'];
                    echo "<h5 >Bienvenue</h5><h5> $bienvenue</h5>";
                    //}
                }
                } else {
                    echo "<h5 id='bienvenue'>Bienvenue</h5>";
                    ?>
                    <!-- Ne pas effacer ce lien
                Pour la premiére phase de déploiement, on oublie toutes les opérations relatives au client(création de compte, panier, passer une commande)
                        <a id="creationCompte" href="?action=nouveauClient">Se créer un compte</a>
                        -->
                    <?php
                    }

            ?>
            </div>
        </div>
    </div>
</header>