<?php
include_once __DIR__ . "/../../modele/DAO/OeuvreDAO.class.php";
include_once __DIR__ . "/../../modele/DAO/ClientDAO.class.php";
include_once __DIR__ . "/../../modele/DAO/categorieDAO.class.php";
include_once __DIR__ . "/../../modele/oeuvre.class.php";
include_once __DIR__ . "/../../modele/categorie.class.php";

function afficherErreurs($tabMessages)
{
    if (count($tabMessages) > 0) {
        echo "<div class='erreurMessage'>";

        foreach ($tabMessages as $message) {
            echo "<p>$message</p>";
        }
        echo "</div>";
    }
}

function afficherMenu($tableau, $indiceOptionActive, $id)
{
    echo "<ul $id>";
    $i = 0;
    foreach ($tableau as $itemMenu => $lien) {
        $classe = "";
        if ($indiceOptionActive == $i) {
            $classe = " class='option_active'";
        }
        echo "<li $classe><a href='$lien'>$itemMenu</a></li>";
        $i++;
    }
    echo "</ul>";
}

function testerEntree($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    return htmlspecialchars($data);
}


function afficherTableOeuvres()
{
    $_SESSION['tableauDOeuvre'] = array();
    $categories = CategorieDao::chercherTous();
    foreach ($categories as $categorie) {
        echo "<div class='cat-rangee'>";
        echo "<h4 class='categorie-titre'> " . ucfirst($categorie->getDescCategorie()) . "</h4>";
        echo "<div class='categorie'>";
        $unTableau = OeuvreDAO::chercherParCategorie($categorie->getIdCategorie());

        afficheLesOeuvresDunTableau($unTableau);

    }

}

function afficherToutesLesOeuvres()
{

    echo "<div class='cat-rangee'>
    <h4 class='categorie-titre'>Les oeuvres</h4>
    <div class='categorie'>";

    $unTableau = OeuvreDAO::chercherTous();

    afficheLesOeuvresDunTableau($unTableau);
}


function afficherOeuvresPanier()
{

    $total = 0;
    if (isset($_SESSION['tableauOeuvre'])) {
        //afficher les oeuvres
        foreach ($_SESSION['tableauOeuvre'] as $o) {
            $uneOeuvre = OeuvreDAO::chercher($o);
            ?>
            <div class="container bg-color <?php echo "casepanier" . $o ?>">
                <div class="row  align-items-baseline">
                    <div class="col-md-3 col-sm-3 col-12 image">
                        <img src="<?php echo $uneOeuvre->getUrlPhotoMini() ?>" alt="">
                    </div>
                    <div class="titre col-4 col-md-3">
                        <?php echo $uneOeuvre->getTitre() ?>
                    </div>
                    <div class="col-md-2 col-sm-2 col-4">
                        <?php echo $uneOeuvre->getPrix();
                        $total += $uneOeuvre->getPrix() ?>$
                    </div>
                    <div class="col-sm-4 col-12">
                        <input type="button" value="Enlever du panier"
                               onclick="enleverOeuvre(<?php echo $o . ", " . $uneOeuvre->getPrix(); ?>)">
                    </div>
                </div>
            </div>
            <?php
        } ?>
        <div class="container bg-color <?php echo "casepanier" ?>">
            <div class="row  align-items-baseline">
                <div class="col-12">

                </div>
                <div class="col-lg-2  col-sm-3 col-6">
                    votre total :
                </div>
                <div class="col-md-2  col-sm-3 col-6">
                    <span id="total"><?php echo number_format($total,2); ?>$</span>
                </div>
                <div class="col-12 col-sm-4">

                </div>
            </div>
        </div>
        <?php

        $_SESSION['total'] = $total;
    } else {
        echo "il n’y a pas d’oeuvre dans le panier";
    }

}

function afficheLesOeuvresDunTableau($unTableau)
{
    foreach ($unTableau as $uneOeuvre) {
        // TODO clarifier ce teste à quoi ça sert de passer un tableau    
        if (isset($_SESSION['tableauOeuvre'])) {
            $indice = array_search($uneOeuvre->getIdOeuvre(), $_SESSION['tableauOeuvre']);

            if ($indice !== false) {
                $oeuvreTrouvee = true;
            } else {
                $oeuvreTrouvee = false;
            }
            if (!$oeuvreTrouvee) {
                afficherUneOeuvreCatalogue($uneOeuvre);

            }
        } else {
            afficherUneOeuvreCatalogue($uneOeuvre);
        }
    }
    echo "</div></div>";
}

function afficherUneOeuvreCatalogue($uneOeuvre)
{
    $url = '"' . $uneOeuvre->getUrlPhoto() . '"';
    $titreOeuvre = '"' . $uneOeuvre->getTitre() . '"';

    $parametres = $url . ", " . $uneOeuvre->getPrix() . ", ";
    $parametres .= $uneOeuvre->getIdOeuvre() . ", ";
    $parametres .= $titreOeuvre . ")'";

    ?>
<div class="item_cat <?php echo "thumb_" . $uneOeuvre->getIdOeuvre() ?>"
     onclick=<?php echo "'" ?>afficherGrandeOeuvre(<?php echo $parametres ?>>
    <div>
        <img alt="<?php echo $uneOeuvre->getDescription() ?>"
             src="<?php echo $uneOeuvre->getUrlPhotoMini() ?>" width='100'/>
        <div><?php echo $uneOeuvre->getTitre() ?></div>
    </div>
    </div><?php

}

function confirmerPanier()
{
    $total = $_SESSION['total'];
    if (isset($_SESSION['tableauOeuvre'])) {

        echo "<div>";
        foreach ($_SESSION['tableauOeuvre'] as $o) {
            $uneOeuvre = OeuvreDAO::chercher($o);
            echo "<img src='" . $uneOeuvre->getUrlPhotoMini() . "' width='100' alt='" . $uneOeuvre->getTitre() ."'>";
            echo $uneOeuvre->getTitre();
            echo $uneOeuvre->getPrix();
            echo "<br>";
        }
        echo "<br><hr>";
        echo "</div>";

        echo "<div class='alert-light alert me-4'>Total : " . $total . ".00$</div>";

    }
}

function afficherTopFacture($tabFacture)
{
    $tableFacture = '<div class="facture"><table>';
    $total = $_SESSION['total'];

    foreach ($tabFacture as $key => $value) {

        $tableFacture .= '<tr><td>Numéro de commande : ' . $value[0] . '</td><td>Numéro de client : ' . $value[1] . '</td></tr>';
        $tableFacture .= '<tr><td>Nom : ' . $value[2] . " " . $value[3] . '</td><td>Courriel : ' . $value[4] . '</td></tr>';
        $tableFacture .= '<tr><td>Adresse : ' . $value[5] . '</td></tr>';
        $tableFacture .= '<tr><td>Un total de ' . $total . '$ a été porté à votre carte ' . substr($value[6],0,4) . '****</td></tr>';
    }

    // retourner le tableau rempli
    $tableFacture .= '</table></div>';

    // on remet le total de la session a zero
    $_SESSION['total'] = 0;

    return $tableFacture;
}

function afficherContenuFacture($tabFacture)
{
    $tableFacture = '<div class="facture"><table>';

    foreach ($tabFacture as $key => $value) {
        $tableFacture .= '<tr>';
        foreach ($value as $key2 => $value2) {
            $tableFacture .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $tableFacture .= '</tr>';
    }

    // retourner le tableau rempli
    $tableFacture .= '</table></div>';

    return $tableFacture;
}

?>
