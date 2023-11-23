
    
<?php
$titre = "Galerie Raymond";

$typeActeur = $controleur->getActeur();
if ($typeActeur == "admin")
    $clientConnecte = "admin";
?>

    <title><?php echo $titre ?></title>
</head>

<body>
<?php include __DIR__ . '/inclusions/header.php'?>

<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/nav.php' ?>
    <main>
        <form>
            <select onchange="affichageChoixMenu()" class="form-select affCatalogue"
                    name="affCatalogueOeuvres" id="affCatalogueOeuvres">
                <option id="affCatalogueTout" value="affCatalogueTout">Toutes les oeuvres</option>
                <option id="affCatalogueCat" value="affCatalogueCat">Les oeuvres par catégorie</option>
            </select>

        </form>
    <div id="testaff1"><?php afficherToutesLesOeuvres(); ?></div>
<div id="testaff2" class="testAff"><?php afficherTableOeuvres(); ?></div>


    </main>
</div>
</body>
</html>