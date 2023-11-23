<?php
// *****************************************************************************************
// Description   : Créer un controleur nommé Defaut hérite du controleur abstrait
//                 retourne la page d'accueil
// Date          : 21 octobre 2022
// Auteurs       : Olivier Raymond et Elisabeth Tremblay
// *****************************************************************************************
include_once("controleurs/controleur.abstract.class.php");
class CtlrAccueilDefaut extends Controleur
{

    // ******************* Constructeur vide
    public function __construct()
    {
        //appel du constructeur parent
        parent::__construct();
    }

    // ******************* Méthode exécuter action
    // implémenter la méthde executerAction
    // retournez la page d'accueil
    public function executerAction()
    {
        //----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
        return "vueAccueil";
    }


}