<?php
$titre = "Nouvelle oeuvre étape 2";
?>
    <title><?php echo $titre ?></title>
</head>

<body>
<?php include __DIR__ . '/inclusions/header.php'?>
<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/nav.php' ?>
    <main>
        <form action="?action=pageEntrerOeuvre" method="post">
            <input type="submit" value="Autre ajout">
        </form>
    </main>
</div>
</body>
</html>
