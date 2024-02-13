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
            return "vueEntreOeuverEtape3";
        }
        return "vueEntrerOeuvreEtape4";
    }

    public function validerEtape4(){
        if (isset($POST['categorie'])){
            
        }
        $_SESSION['errCategorie'] = "";
    }
}