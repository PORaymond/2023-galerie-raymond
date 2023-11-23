<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour créer un nouveau compte client
// Date          : 21 octobre 2022
// Auteurs       : Elisabeth Tremblay
// *****************************************************************************************

// ce controlleur est appelé par l’action "nouveauClient"
include_once(__DIR__ . "/controleur.abstract.class.php");
include_once(__DIR__ . "/../modele/DAO/ClientDAO.class.php");
include_once(__DIR__ . "/../modele/client.class.php");
// TODO Changer le nom du controlleur
class CtlrNouveauClient extends Controleur
{
    private $tabClients;

    public function __construct()
    {
        parent::__construct();
        $this->tabClients = array();
    }

    public function getTabClients(): array
    {
        return $this->tabClients;
    }
    // executerAction retourne le nom de la vue à afficher par index.php
    public function executerAction()
    {
            return "nouveauClient";
    }



}