<?php
include_once("controleurs/controleur.abstract.class.php");
// *****************************************************************************************
// Description   : Contrôleur pour déconnecter le compte client actif.
// Date          : 21 octobre 2022
// Auteurs       : Elisabeth Tremblay
// *****************************************************************************************
class Deconnexion extends Controleur
{
    public function __construct()
    {
        //appel du constructeur parent
        parent::__construct();
    }

    public function executerAction()
    {
        $this->logout();
        return "pageAccueil";
    }

    public function logout()
    {

        if (!isset($_SESSION['utilisateurConnecte'])) {
            header("Location: index.php");
        }

        $nomUtilisateur = $_SESSION['utilisateurConnecte'];
        unset($_SESSION['utilisateurConnecte']);
        session_destroy();
    }
}