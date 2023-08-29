<!-- On redirige vers l'index du site si on essaie d'avoir un accès direct -->
<?php if (!isset($controleur)) header("Location: ..\index.php");
//if (session_status() == PHP_SESSION_NONE){
//    session_start();
//}

?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <title>Bienvenue à la galerie Raymond</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style_accueil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</head>

<body>

<div class="conteneur">

    <div class="entete">
        <h1>Bienvenue à la galerie Raymond</h1>
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