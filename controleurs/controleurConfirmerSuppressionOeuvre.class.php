<?php
// *****************************************************************************************
// Description   : Contrôleur spécifique pour l'admin pour confirmer la suppression d'une Oeuvre du catalogue
// Date          : 21 octobre 2022
// Auteurs       : Olivier Raymond
// *****************************************************************************************
include_once(__DIR__ . "/controleurManufacture.class.php");
include_once(__DIR__ . "/../modele/DAO/OeuvreDAO.class.php");

class CtlrConfirmerSuppressionOeuvre extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        $this->recupererIdSuppression();
        return "vueConfirmerSuppressionOeuvre";
    }

    public function recupererIdSuppression()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_POST)) {
            $_SESSION['choixSuppression'] = $_POST['choixSuppression'];
        }

    }
}