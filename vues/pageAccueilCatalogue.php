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

    <title><?php echo $titre ?></title>
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