<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour l'admin pour supprimer une Oeuvre du catalogue
// Date          : 21 octobre 2022
// Auteurs       : Olivier Raymond
// *****************************************************************************************
include_once(__DIR__ . "/controleurManufacture.class.php");
include_once(__DIR__ . "/../modele/DAO/OeuvreDAO.class.php");

class CtlrChoisirSuppressionOeuvre extends Controleur
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
        foreach ($unTableau as $uneOeuvre) {
            echo "<div class='item'>";
            echo "<img alt='" . $uneOeuvre->getDescription() . "' src='" . $uneOeuvre->getUrlPhotoMini() . "' width='100' />";
            echo " [id : " . $uneOeuvre->getIdOeuvre() . "]   " . $uneOeuvre->getTitre();
            echo "</div>";
        }
    }

    public function executerAction()
    {
        $this->tabOeuvres = OeuvreDAO::chercherTous();
        return "pageChoisirSuppressionOeuvre";
    }
}