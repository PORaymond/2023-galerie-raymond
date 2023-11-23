<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour l'action de adminCatalogue qui s'occupe de gérer
//                 l'affichage de l'ensemble des Oeuvres
// Date        : 21 octobre 2022
// Auteur      :  Olivier Raymond
// *****************************************************************************************
include_once("controleurs/controleur.abstract.class.php");
include_once("modele/DAO/OeuvreDAO.class.php");

class CtlrModifierOeuvre extends Controleur
{
    private $tabOeuvres;

    public function __construct()
    {
        parent::__construct();
        $this->tabOeuvres = array();
    }

    public function getTabOeuvres()
    {
        return $this->tabOeuvres;
    }

    public function afficherToutesOeuvres($unTableau)
    {
        ?> <div> <?php
        foreach ($unTableau as $uneOeuvre) {
            echo "<div class='container bg-color casepanier'>";
            ?>
            <div class="row align-items-baseline">
                <div class ="col image">
                    <img alt='<?php $uneOeuvre->getDescription()?>' src='<?php echo $uneOeuvre->getUrlPhotoMini() ?>' width='100'/>
                </div>
                <div class="col">
                    [id : <?php echo $uneOeuvre->getIdOeuvre()?>]
                </div>
                <div class="col">
                    <?php echo $uneOeuvre->getTitre()?>
                </div>
            </div>

            <?php
            echo "</div>";
        }
        ?> </div> <?php
    }

    public function executerAction()
    {
        $this->tabOeuvres = OeuvreDAO::chercherTous();
        return "pageModifierOeuvre";
    }
}