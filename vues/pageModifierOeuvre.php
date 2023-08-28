<?php $titre = "Modifier"?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
<?php include __DIR__ . '/inclusions/header.php'?>

<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/nav.php' ?>
    <main>
        <h3>Choisir une oeuvre à modifier</h3>
        <form action="?action=pageConfirmerModifOeuvre" method="post">
            <label for="id-oeuvre-modif">id de l’oeuvre choisie : </label> <br>
            <input type="text" name="id-oeuvre-modif" id="id-oeuvre-modif">
            <input type="submit" value = "Modifier">
            <br>
        </form>
        <?php
        echo "<br>";
        $tabOeuvre = $controleur->getTabOeuvres();
        $controleur->afficherToutesOeuvres($tabOeuvre);
        ?>

    </main>
</div>
<?php include __DIR__ . '/inclusions/top-mobile.php' ?>
<?php include __DIR__ . '/inclusions/bottom-mobile.php' ?>
<?php include __DIR__ . '/inclusions/scripts.php' ?>
</body>
</html>
<?php
//Vue1
//On affiche le catalogue complet avec de lien cliquable sur l’image
//l’admin clique sur l’image dans le catalogue



//Vue 3
// affichage du résumé des changements (possibilité de revenir à la modification)
// l’utilisateur confirme le changement
// on écrit les changements en bdd


// retour à la page de modification avec toutes les images