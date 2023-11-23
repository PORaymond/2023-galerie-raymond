<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
//                 page d'accueil
// Date        : 12 Decembre  2021
// Auteur      : Dini Ahamada
// *****************************************************************************************
include_once("controleurs/controleur.abstract.class.php");
include_once(__DIR__ . "/../modele/DAO/ClientDAO.class.php");
include_once(__DIR__ . "/../modele/client.class.php");

class CtlrSeConnecter extends Controleur
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
        if ($this->acteur == "client") {
            array_push($this->messagesErreur, "Vous êtes déjà connecté.");
            return "vueLoginClient";
        }
        //----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS ---------------

        if (isset($_POST['nom_utilisateur'])) {
            $clientLogin = ClientDAO::chercherLogin($_POST['nom_utilisateur']);
            if ($clientLogin == null) {
                array_push($this->messagesErreur, "Ce client n'existe pas.");
                return "vueLoginClient";
            } elseif (!($clientLogin->getMdPasse() === ($_POST['mot_passe']))) {
                array_push($this->messagesErreur, "Le mot de passe est incorrect.");
                return "vueLoginClient";
            } else {
                $this->acteur = "client";
                $_SESSION['bienvenueClient'] = $clientLogin->getPrenom() . " " . $clientLogin->getNom();
                $_SESSION['utilisateurConnecte'] = "client";
                // pour recuperer idClient pour la commande
                $_SESSION['idUtilisateur'] = $clientLogin->getIdClient();
                return "vueAccueilCatalogue";
            }
        }
        return "vueAccueilCatalogue";
    }
}
