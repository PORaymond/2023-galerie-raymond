<?php
include_once (__DIR__."/fonctions.inc.php");
?>
<nav id = "nav-menu" class="couleur-fond">
    <a href="javascript:void(0)" class="icon" onclick = "myFunction()">
    <i class = "fa fa-bars"></i></a>
    <?php
    $lien = array(
        "Création d’un item" =>"?action=entrerOeuvre",
        "Afficher le catalogue"=>"?action=adminCatalogue",
        "Mise à jour d'une oeuvre"=>"?action=modifierOeuvre",
        "Suppression d'une oeuvre"=>"?action=choisirSuppressionOeuvre",
        "Déconnexion"=>"?action=deconnexionAdmin");
    afficherMenu($lien,0,"id='myLinks'");
    ?>

</nav>

