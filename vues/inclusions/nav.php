<?php
include_once (__DIR__."/fonctions.inc.php");
?>
<nav id = "nav-menu" class="couleur-fond">
    <a href="javascript:void(0)" class="icon" onclick = "myFunction()">
    <i class = "fa fa-bars"></i></a>
    <?php
    $lien = array(
        "Création d’un item" =>"?action=pageEntrerOeuvre",
        "Afficher le catalogue"=>"?action=pageAdminCatalogue",
        "Mise à jour d'une oeuvre"=>"?action=pageModifierOeuvre",
        "Suppression d'une oeuvre"=>"?action=pageChoisirSuppressionOeuvre",
        "Déconnexion"=>"?action=deconnexionAdmin");
    afficherMenu($lien,0,"id='myLinks'");
    ?>

</nav>

