
<?php
include_once __DIR__."/inclusions/fonctions.inc.php";
$titre = "Votre panier";
?>
    <title><?php echo $titre ?></title>
</head>
<body>
<?php include __DIR__ . '/inclusions/header.php' ?>

<div class="zone-affichage">
    <?php include __DIR__ . '/inclusions/navCatalogue.php' ?>
    <main>
        <div>
            <?php
                afficherOeuvresPanier();
            ?>
        </div>
        <div class="container bg-color">
            <div id="boutonNav" class="row justify-content-end">
                <div class = "col-6 col-sm-5">
                    <form method="post" action="?action=accueilCatalogue">
                        <input type="submit" value="Poursuivre la sélection">
                    </form>
                </div>
                <div class = "col-6 col-sm-4">
                    <form method="post" action="?action=confirmerCommande">
                        <input type="submit" value="Finaliser la commande">
                    </form>
                </div>
            </div>
        </div>

    </main>
</div>
</body>
</html>

