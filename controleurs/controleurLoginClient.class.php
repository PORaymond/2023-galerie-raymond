<?php
include_once("controleurs/controleur.abstract.class.php");

class LoginClient extends Controleur
{
    public function __construct()
    {
        //appel du constructeur parent
        parent::__construct();
    }

    public function executerAction()
    {
        if (isset($_SESSION['utilisateurConnecte'])) {
            array_push($this->messagesErreur, "Vous êtes déjà connecté.");
            return "pageAccueilCatalogue";
        }
        return "loginClient";
    }
}