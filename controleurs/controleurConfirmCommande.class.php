<?php
// *****************************************************************************************
// Description   : Contrôleur pour passer une commande à partir des Oeuvres ajoutées au
//                 panier du client
// Date          : 21 octobre 2022
// Auteurs       : Elisabeth Tremblay
// *****************************************************************************************
include_once(__DIR__ . "/controleur.abstract.class.php");
include_once(__DIR__ . "/../modele/DAO/ClientDAO.class.php");
include_once(__DIR__ . "/../modele/client.class.php");
include_once(__DIR__ . "/../modele/DAO/OeuvreDAO.class.php");
include_once(__DIR__ . "/../modele/oeuvre.class.php");
include_once(__DIR__ . "/../modele/DAO/commandeDAO.class.php");
include_once(__DIR__ . "/../modele/commande.class.php");

class ConfirmCommande extends Controleur
{
    private $tabCommande;
    private $tabOeuvres;

    public function __construct()
    {
        $this->tabCommande = array();
        $this->tabOeuvres = array();

        parent::__construct();
    }

    public function getTabCommande(): array
    {
        return $this->tabCommande;
    }

    public function getTabOeuvres(): array
    {
        return $this->tabOeuvres;
    }

    public function executerAction()
    {
        return "pageConfirmationCommande";

    }

}
