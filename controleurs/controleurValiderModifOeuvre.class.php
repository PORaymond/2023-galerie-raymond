<?php
include_once(__DIR__ . "/../modele/DAO/OeuvreDAO.class.php");
include_once(__DIR__ . "/../modele/oeuvre.class.php");
include_once(__DIR__ . "/controleur.abstract.class.php");

class CtlrValiderModifOeuvre extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {

        return "vueValiderModifOeuvre";

    }
}