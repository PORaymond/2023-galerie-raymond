<?php
// *****************************************************************************************
// Description   : Contrôleur pour déconnecter le compte admin actif.
// Date          : 21 octobre 2022
// Auteurs       : Olivier Raymond et Elisabeth Tremblay
// *****************************************************************************************

class DeconnexionAdmin extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        unset($_SESSION['utilisateurConnecte']);

        session_destroy();
        return "pageAccueil";
    }
}