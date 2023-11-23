
<?php
$titre = "Choisir la suppression";
?>

    <title><?php echo $titre ?></title>
</head>

<body>
<?php include __DIR__ . '/inclusions/header.php'?>

<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/nav.php' ?>
    <main>
        <h3>Choisir une oeuvre à supprimer</h3>
        <form action="?action=pageConfirmerSuppressionOeuvre" method="post">
            <label for="choix-suppression"></label>
            <input type="text" name="choixSuppression" id="choix-suppression">
            <input type="submit" value="Choisir">
        </form>

        <?php
        $tabOeuvre = $controleur->getTabOeuvres();
        $controleur->afficherToutesOeuvres($tabOeuvre);
        ?>

    </main>
</div>
</body>
</html>

