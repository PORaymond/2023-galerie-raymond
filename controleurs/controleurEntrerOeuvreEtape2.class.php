<?php
include_once("controleur.abstract.class.php");

class EntrerOeuvreEtape2 extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        $this->validerEtape1();
        if (empty($_SESSION['titre'])) {
            return "pageEntrerOeuvre";
        } else {
            return "pageEntrerOeuvreEtape2";
        }
        
    }
    public function validerEtape1(){
         
        /**
         * Cette fonction prend un paramètre en entrée et le débarasse des espaces et slashes inutiles
         * elle évite l’injection de code malicieux en remplaçant les charactères spéciaux par des entités HTML
         * ref: https://www.w3schools.com/php/php_form_validation.asp
         * De plus, la fonction enregistre des messages d’erreurs dans le tableau de variables globales si l’un
         * des champs nécessaire est manquant.
         * @param $data
         * @return string
         */

        $_SESSION['titre'] = "";
        $_SESSION['descOeuvre'] = "";

        $errTitre = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["titre"])) {
                $errTitre = "Le Titre doit être fourni";
            } else {
                $_SESSION['titre'] = testerEntree($_POST['titre']);
            }
            if (!empty($_POST["desc_oeuvre"])) {
                $_SESSION['descOeuvre'] = testerEntree($_POST["desc_oeuvre"]);
            }
            $_SESSION['errTitre'] = $errTitre;   
        }
    }
}