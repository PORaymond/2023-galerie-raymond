<?php
include_once(__DIR__ . "/fonctions.inc.php");
?>
<nav id="nav-menu" class="couleur-fond">
    <a href="javascript:void(0)" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i></a>
    <?php
    $lien = array(
        "Accueil" => "?action=accueil"/*, ne pas effacer c’est pour la phase 2
        "Connexion client" => "?action=loginClient"*/
    );

    if (isset($_SESSION['utilisateurConnecte'])) {
        array_pop($lien);
        $lien += ["Déconnexion client" => "?action=deconnexion"];
    }
    afficherMenu($lien, 0, "id='myLinks'");
    ?>

</nav>
