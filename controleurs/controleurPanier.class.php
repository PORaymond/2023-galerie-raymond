<?php

class Panier extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        return "pagePanier";
    }
}