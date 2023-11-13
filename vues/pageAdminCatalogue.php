<!DOCTYPE html>
<html lang="fr">
    
<?php
$titre = "Galerie Raymond";

$typeActeur = $controleur->getActeur();
if ($typeActeur == "admin")
    $clientConnecte = "admin";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
            integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style_admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</head>

<body>
<?php include __DIR__ . '/inclusions/header.php'?>

<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/nav.php' ?>
    <main>
        <form>
            <select onchange="affichageChoixMenu()" class="form-select affCatalogue"
                    name="affCatalogueOeuvres" id="affCatalogueOeuvres">
                <option id="affCatalogueTout" value="affCatalogueTout">Afficher toutes les oeuvres</option>
                <option id="affCatalogueCat" value="affCatalogueCat">Afficher les oeuvres par catégorie</option>
            </select>

        </form>
    <div id="testaff1"><?php afficherToutesLesOeuvres(); ?></div>
<div id="testaff2" class="testAff"><?php afficherTableOeuvres(); ?></div>


    </main>
</div>
</body>
</html>