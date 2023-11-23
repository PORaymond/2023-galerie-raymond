<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour l'action de adminCatalogue qui s'occupe de gérer
//                 l'affichage de l'ensemble des Oeuvres
// Date        : 21 octobre 2022
// Auteur      : Olivier Raymond
// *****************************************************************************************
include_once("controleurs/controleur.abstract.class.php");
include_once("modele/DAO/OeuvreDAO.class.php");

class CtlrAdminCatalogue extends Controleur
{
    // ******************* Attributs
    private $tabOeuvres;

    // ******************* Constructeur vide
    public function __construct()
    {
        parent::__construct();
        $this->tabOeuvres = array();
    }

    // ******************* Accesseurs
    public function getTabOeuvres()
    {
        return $this->tabOeuvres;
    }

    public function afficherToutesOeuvres($unTableau)
    {
        foreach ($unTableau as $uneOeuvre) {
            echo "<div class='item'>";
            echo "<img alt='" . $uneOeuvre->getDescription() . "' src='images/" . $uneOeuvre->getUrlPhoto() . "' width='100' />";
            echo $uneOeuvre->getTitre();
            echo "</div>";
        }
    }

    // ******************* Méthode exécuter action
    public function executerAction()
    {
        $this->tabOeuvres = OeuvreDAO::chercherTous();
        return "pageAdminCatalogue";
    }

}