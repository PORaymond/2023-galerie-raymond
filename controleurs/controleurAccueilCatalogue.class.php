<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour l'action de accueilCatalogue qui s'occupe de gérer
//                 l'affichage de l'ensemble des Oeuvres
// Date          : 21 octobre 2022
// Auteurs       : Olivier Raymond et Elisabeth Tremblay
// *****************************************************************************************
include_once("controleurs/controleur.abstract.class.php");
include_once("modele/DAO/OeuvreDAO.class.php");

class AccueilCatalogue extends Controleur
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

    // ******************* Méthode exécuter action
    public function executerAction()
    {
        $this->tabOeuvres = OeuvreDAO::chercherTous();
        return "pageAccueilCatalogue";
    }

}
