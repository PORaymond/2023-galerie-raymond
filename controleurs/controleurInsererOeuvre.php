<?php
include_once(__DIR__ . "/controleur.abstract.class.php");
include_once(__DIR__ . "/../modele/DAO/OeuvreDAO.class.php");
include_once(__DIR__ . "/../modele/oeuvre.class.php");

class CtlrInsererOeuvre extends Controleur
{
    public function __construct()
    {
        //appel du constructeur parent
        parent::__construct();
    }

    public function executerAction()
    {
        $this->faireInsertion();
        return "vueInsererOeuvre";
    }

    public function faireInsertion()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $uneOeuvre = new Oeuvre(

            0,
            $_SESSION['titre'],
            $_SESSION['descOeuvre'],
            $_SESSION['prix'],
            $_SESSION['date'],
            $_SESSION['photo'],
            null,
            null,
            $_SESSION['categorie'],
            "true"
        );
        unset($_SESSION['titre']);
        unset($_SESSION['descOeuvre']);
        unset($_SESSION['prix']);
        unset($_SESSION['date']);
        unset($_SESSION['photo']);
        unset($_SESSION['categorie']);
        OeuvreDAO::inserer($uneOeuvre);
    }
}