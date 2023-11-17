<?php
include_once("controleur.abstract.class.php");

class EntrerOeuvreEtape2 extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        return "pageEntrerOeuvreEtape2";
    }
}