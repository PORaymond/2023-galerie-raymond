<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour l'admin pour enregistrer la modification d'une Oeuvre du catalogue
// Date          : 21 octobre 2022
// Auteurs       : Olivier Raymond
// *****************************************************************************************
include_once(__DIR__ . "/../modele/DAO/OeuvreDAO.class.php");
include_once(__DIR__ . "/../modele/oeuvre.class.php");
include_once(__DIR__ . "/controleur.abstract.class.php");

class CtlrEnregistrerModification extends Controleur
{
    public function __construct()
    {
        parent::__construct();
        echo "construct enrModif";
    }

    public function executerAction()
    {

        $this->enregistrerLesModifications();
        return "vueEnregistrerModification";

    }

    public function enregistrerLesModifications()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $uneOeuvre = new Oeuvre(
            $_SESSION['idOeuvre'],
            $_SESSION['titre'],
            $_SESSION['descOeuvre'],
            $_SESSION['prix'],
            $_SESSION['dateCreation'],
            $_SESSION['url_photo'],
            null,
            $_SESSION['idCommande'],
            $_SESSION['idCategorie'],
            "true"
        );
        //TODO
        $dump = OeuvreDAO::modifier($uneOeuvre);
    }
}