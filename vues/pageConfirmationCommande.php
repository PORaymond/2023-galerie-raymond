<?php

$titre = "Confirmer votre commande";

?>
<!doctype html>
<html lang="fr">

<?php
include_once "vues/inclusions/contenu-head.php"
?>
<body>

<?php include_once "vues/inclusions/header.php"; ?>

<div class="conteneur_principal zone-affichage">

    <?php
    include_once "vues/inclusions/navCatalogue.php" ?>
    <main class="zone_centre">

        <?php
        if (!empty($_SESSION)) {

            confirmerPanier();
        }

        ?>

        <div class="container">
            <div class="row p-3 alert-light alert me-4 justify-content-end">
                <div class="col-4">
                    <a href="?action=pageFactureCommande">Confirmer la commande</a>
                </div>
                <div class="col-4">
                    <a href="?action=pagePanier">Retourner au panier</a>
                </div>

                <div class="col-4">
                    <a href="?action=accueilCatalogue">Poursuivre votre sélection</a>

                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
