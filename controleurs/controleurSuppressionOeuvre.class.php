<?php
include_once(__DIR__ . "/controleur.abstract.class.php");
include_once(__DIR__ . "/../modele/DAO/OeuvreDAO.class.php");
include_once(__DIR__ . "/../modele/oeuvre.class.php");

class CtlrSuppressionOeuvre extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        $this->supprimerOeuvre();
        return "vueSuppressionOeuvre";
    }

    public function supprimerOeuvre()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $uneOeuvre = OeuvreDAO::chercher($_SESSION['choixSuppression']);
        OeuvreDAO::supprimer($uneOeuvre);
    }
}