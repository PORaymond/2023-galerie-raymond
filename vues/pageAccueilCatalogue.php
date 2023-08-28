<!-- On redirige vers l'inde du site si on essaie d'avoir un accès direct -->
<?php if (!isset($controleur)) header("Location: ..\index.php");
$titre = "Catalogue";

$typeActeur = $controleur->getActeur();
if ($typeActeur == "client")
    $clientConnecte = $_SESSION['bienvenueClient'];
elseif ($typeActeur == "admin")
    $clientConnecte = "admin";
else $clientConnecte = "visiteur";

?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8"/>

    <title><?php echo $titre ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
            integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
            crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <script type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>

    <link rel="stylesheet" href="assets/css/style_admin.css">

    <script type="text/javascript" src="assets/js/script.js"></script>

</head>

<body>
<div id = "ecranCache" onclick="toggleZoneAffiche()"></div>
<div class='justify-content-center invisible' id ='zone-affiche'>
    <div id= 'fiche' class='card mx-auto'>
        <img class='mx-auto' src="" alt="" width="100%">
        <h3></h3>
        <div class=' display-5 text-end'></div>
        <input type='button' id= 'btnAjouter' value='Ajouter au panier' onclick="">
    </div>
</div>

<?php include_once __DIR__ . '/inclusions/header.php' ?>
<div class="conteneur_principal zone-affichage">

    <?php include_once __DIR__ . '/inclusions/navCatalogue.php' ?>

    <main class="zone_centre">
        <div>
            <?php if ($controleur->getActeur() == "client"){ ?>
                <a href="?action=pagePanier"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            ( <span id = "nbOeuvresPanier">
                            <?php
                                if (isset($_SESSION['nbOeuvresPanier'])){
                                    echo $_SESSION['nbOeuvresPanier'];
                                } else {

                                    echo "0";
                                }?>
                            </span>)
                </a>
            <?php } ?>
            <select onchange="affichageChoixMenu()" class="form-select affCatalogue"
                    name="affCatalogueOeuvres" id="affCatalogueOeuvres">
                <option id="affCatalogueTout" value="affCatalogueTout">Afficher toutes les oeuvres</option>
                <option id="affCatalogueCat" value="affCatalogueCat">Afficher les oeuvres par catégorie</option>
            </select>

        </div>
        <div id="testaff1"><?php afficherToutesLesOeuvres(); ?></div>
        <div id="testaff2" class="testAff"><?php afficherTableOeuvres(); ?></div>
    </main>

</div>
</body>
</html>