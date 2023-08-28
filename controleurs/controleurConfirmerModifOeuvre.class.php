<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour l'admin pour confirmer la modification d'une Oeuvre du catalogue
// Date          : 21 octobre 2022
// Auteurs       : Olivier Raymond
// *****************************************************************************************
include_once(__DIR__ . "/../modele/DAO/OeuvreDAO.class.php");
include_once(__DIR__ . "/../controleurs/controleur.abstract.class.php");

class ConfirmerModifOeuvre extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        $this->confirmerModification();
        return "pageConfirmerModifOeuvre";
    }

    public function confirmerModification()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //Vue 2
        //l’appli retourne le code
        if (isset($_POST['id-oeuvre-modif'])) {
            $oeuvreAModifier = OeuvreDAO::chercher($_POST['id-oeuvre-modif']);
            $_SESSION['idOeuvre'] = $oeuvreAModifier->getIdOeuvre();
            $_SESSION['titre'] = $oeuvreAModifier->getTitre();
            $_SESSION['descOeuvre'] = $oeuvreAModifier->getDescription();
            $_SESSION['prix'] = $oeuvreAModifier->getPrix();
            $_SESSION['dateCreation'] = $oeuvreAModifier->getDateCreation();
            $_SESSION['url_photo'] = $oeuvreAModifier->getUrlPhoto();
            $_SESSION['idCommande'] = $oeuvreAModifier->getIdCommande();
            $_SESSION['idCategorie'] = $oeuvreAModifier->getIdCategorie();

        }

        //on affiche toutes les informations modifiables dans un formulaire
        // l’utilisateur change les infos
        // l’utilisateur transmet le formulaire
    }
}
