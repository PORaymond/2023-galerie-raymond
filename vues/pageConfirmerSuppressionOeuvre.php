
<?php
$titre = "Confirmer la suppression";
?>

    <title><?php echo $titre ?></title>
</head>

<body>
<?php include __DIR__ . '/inclusions/header.php'?>

<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/nav.php' ?>
    <main>
        <?php   echo "<p>Voulez-vous vraiment supprimer cette oeuvre?</p>"?>
        <form action="?action=suppressionOeuvre" method="post">
            <input type="submit" value="Confirmer">
        </form>
    </main>
</div>
</body>
</html>
