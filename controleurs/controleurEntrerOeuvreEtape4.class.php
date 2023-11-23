<?php
include_once("controleur.abstract.class.php");

class CtlrEntrerOeuvreEtape4 extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        $this->validerEtape4();
        if(!empty($_SESSION['errCategorie'])){
            return "pageEntreOeuverEtape4";
        }
        return "pageEntrerOeuvreEtape4";
    }

    public function validerEtape4(){
        $_SESSION['errCategorie'] = "";
    }
}