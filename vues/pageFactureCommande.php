<!-- On redirige vers l'inde du site si on essaie d'avoir une accès direct -->
<?php if (!isset($controleur)) header("Location: ..\index.php");?>
    <title>Votre facture</title>
</head>

<body>
<?php
include_once "vues/inclusions/header.php"

?>
<div class="conteneur-principal zone-affichage">
    <?php include_once "vues/inclusions/navCatalogue.php"; ?>

    <div class="zone_centre">
        <h2>Merci de votre achat!</h2>
        <h2>Voici le contenu de votre commande:</h2>
        <div>
            <?php

            include_once "modele/commande.class.php";
            include_once "vues/inclusions/fonctions.inc.php";
?>
<div>
            <?php

            $clientId = $_SESSION['idUtilisateur'];
            $topFacture = CommandeDAO::obtenirFactureInfosClient($clientId);
            $tableau = afficherTopFacture($topFacture);
            echo $tableau;

            $idCommande = CommandeDAO::chercherLastID();
            $contenuFacture = CommandeDAO::obtenirFactureOeuvres($idCommande);
            $tableau = afficherContenuFacture($contenuFacture);
            echo $tableau;
            ?>
</div>
        </div>

    </div>
</div>

</body>

</html>