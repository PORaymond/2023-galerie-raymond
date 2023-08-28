<?php
include_once("controleur.abstract.class.php");

class EntrerOeuvre extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        return "pageEntrerOeuvre";
    }
}