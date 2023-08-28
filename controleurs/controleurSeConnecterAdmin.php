<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
//                 page d'accueil
// Date        :
// Auteur      :
// *****************************************************************************************
include_once("controleurs/controleur.abstract.class.php");
include_once(__DIR__ . "/../modele/DAO/AdministrateurDAO.class.php");
include_once(__DIR__ . "/../modele/administrateur.class.php");

class SeConnecterAdmin extends Controleur
{

    // ******************* Constructeur vide
    public function __construct()
    {
        parent::__construct();
    }


    // ******************* Méthode exécuter action
    public function executerAction()
    {
        //----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION  -----------
        if ($this->acteur == "admin") {
            array_push($this->messagesErreur, "Vous êtes déjà connecté.");
            return "pageAdminCatalogue";
        }
        //----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS ---------------

        if (isset($_POST['nom_admin'])) {
            $adminLogin = AdministrateurDAO::chercherLogin($_POST['nom_admin']);
            if ($adminLogin == null) {
                array_push($this->messagesErreur, "Cet administrateur n'existe pas.");
                return "loginAdmin";
            } elseif (!($adminLogin->getMdPasse() === ($_POST['mot_passe']))) {
                array_push($this->messagesErreur, "Le mot de passe est incorrect.");
                return "loginAdmin";
            } else {
                $this->acteur = "admin";
                $_SESSION['utilisateurConnecte'] = "admin";
                $_SESSION['bienvenueAdmin'] = $adminLogin->getPrenom() . " " . $adminLogin->getNom();

                return "pageAdminCatalogue";
            }
        }

        return "pageAdminCatalogue";
    }
}
