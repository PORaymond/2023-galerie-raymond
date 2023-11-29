<!-- On redirige vers l'index du site si on essaie d'avoir un accès direct -->
<?php if (!isset($controleur)) header("Location: ..\index.php");
if (session_status() == PHP_SESSION_NONE){
   session_start();
}
$titre = "Bienvenue à la galerie Raymond";
include_once("__DIR__./../inclusions/contenu-head.php");
?>

<title><?php echo ($titre);?></title>

</head>

<body>

    <div class="conteneur">

        <div class="entete">
            <h1 class="titre-accueil"><?php echo ($titre); ?></h1>
        </div>

        <div class="container-fluid">

            <div id="demo" class="carousel slide" data-ride="carousel">

                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <div class="carousel-inner text-center">

                    <div class="carousel-item active"><img src="images/arbre/large/L-arbre-bleu.jpg" alt="..." height="400" /></div>
                    <div class="carousel-item"><img src="images/collage-autarcique/large/mercedes-pour-J.jpg" alt="..." height="400" /></div>
                    <div class="carousel-item"><img src="images/abstraction/large/Jack-et-Vincent.JPG" alt="..." height="400" /></div>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>

        <div class="bas">

            <footer>
                <!---------------- MENU --------------------->
                <ul>
                    <li class='option_active'>
                        <a href="?action=accueilCatalogue">Entrer</a>
                    </li>
                    <!-- Ne pas effacer ce lien
                Pour la premiére phase de déploiement, on oublie toutes les opérations relatives au client(panier, passer une commande)

                <li>
                    <a href="?action=loginClient">Login client</a>
                </li>
                -->
                </ul>
                <!--------------- FIN DU MENU --------------->
            </footer>
        </div>
    </div>
</body>

</html>