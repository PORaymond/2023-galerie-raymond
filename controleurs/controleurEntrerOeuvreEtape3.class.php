<?php
include_once("controleur.abstract.class.php");

class EntrerOeuvreEtape3 extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        $this->validerEtape2();    
        if( empty($_SESSION['errPrix']) || empty($_SESSION['date']))
        {
            return "pageEntrerOeuvreEtape3";
        } else {
            return "pageEntrerOeuvreEtape4";
        }
    }
    public function validerEtape2(){
        $_SESSION['prix'] = "";
        $_SESSION['date'] = "";
        $_SESSION['photo'] = "";

        $errPrix = "";
        $errDate = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty ($_POST["prix"])) {
                $errPrix = "Le prix doit être fourni";
            } else {
                $_SESSION['prix'] = testerEntree($_POST["prix"]);
            }
            if (empty($_POST["date"])) {
                $errDate = "Une date doit être fournie";
            } else {
                $_SESSION['date'] = testerEntree($_POST["date"]);
            }
            if (!empty($_POST['photo'])) {
                $_SESSION['photo'] = testerEntree($_POST['photo']);
            }

            $_SESSION['errPrix'] = $errPrix;
            $_SESSION['errDate'] = $errDate;
        }
    }
}