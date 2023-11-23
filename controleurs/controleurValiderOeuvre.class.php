<?php
include_once("vues/inclusions/fonctions.inc.php");

class CtlrValiderOeuvre extends Controleur
{
    public function __construct()
    {
        parent::__construct();
    }

    public function executerAction()
    {
        $this->validerOeuvre();
        return "pageValiderOeuvre";
    }

    public function validerOeuvre()
    {
        session_start();

        /**
         * Cette fonction prend un paramètre en entrée et le débarasse des espaces et slashes inutiles
         * elle évite l’injection de code malicieux en remplaçant les charactères spéciaux par des entités HTML
         * ref: https://www.w3schools.com/php/php_form_validation.asp
         * @param $data
         * @return string
         */


        $_SESSION['titre'] = "";
        $_SESSION['descOeuvre'] = "";
        $_SESSION['prix'] = "";
        $_SESSION['date'] = "";
        $_SESSION['photo'] = "";

        $errTitre = "";
        $errDescOeuvre = "";
        $errPrix = "";
        $errDate = "";
        $errPhoto = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["titre"])) {
                $errTitre = "Le Titre doit être fourni";
            } else {
                $_SESSION['titre'] = $_POST['titre'];
            }
            if (!empty($_POST["desc_oeuvre"])) {
                $_SESSION['descOeuvre'] = testerEntree($_POST["desc_oeuvre"]);
            }
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
            if (empty($_POST["photo"])) {
                $errPhoto = "Un fichier doit être fourni";
            } else {
                $_SESSION['photo'] = testerEntree($_POST["photo"]);
            }
            $_SESSION['categorie'] = $_POST["categorie"];

            $_SESSION['errTitre'] = $errTitre;
            $_SESSION['errDescOeuvre'] = $errDescOeuvre;
            $_SESSION['errPrix'] = $errPrix;
            $_SESSION['errDate'] = $errDate;
            $_SESSION['errPhoto'] = $errPhoto;

        }

    }
}