<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour créer un nouveau compte client
// Date          : 21 octobre 2022
// Auteurs       : Elisabeth Tremblay
// *****************************************************************************************
include_once(__DIR__ . "/controleur.abstract.class.php");
include_once(__DIR__ . "/../modele/DAO/ClientDAO.class.php");
include_once(__DIR__ . "/../modele/client.class.php");
// TODO Changer le nom du controlleur
class NouveauClient extends Controleur
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

    public function executerAction()
    {
            return "nouveauClient";

    }



}