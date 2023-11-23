<?php
$titre = "Modifier";
?>
    <title><?php echo $titre ?></title>
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