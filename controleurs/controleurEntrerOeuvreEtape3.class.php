<?php
include_once("controleur.abstract.class.php");

class EntrerOeuvreEtape3 extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        return "pageEntrerOeuvreEtape3";
    }
}