<?php
include_once("controleur.abstract.class.php");

class CtlrEntrerOeuvre extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        $this->verifierErreurs();
        return "vueEntrerOeuvre";
    }
    public function verifierErreurs(){
        // Vérification des messages d’erreur
if (!isset($_SESSION['errTitre'])) {
    $_SESSION['errTitre'] = "";
}
if (!isset($_SESSION['errDescOeuvre'])) {
    $_SESSION['errDescOeuvre'] = "";
}
if (!isset($_SESSION['errDate'])) {
    $_SESSION['errDate'] = "";
}
if (!isset($_SESSION['errPhoto'])) {
    $_SESSION['errPhoto'] = "";
}
if (!isset($_SESSION['errPrix'])) {
    $_SESSION['errPrix'] = "";
}
    }
}