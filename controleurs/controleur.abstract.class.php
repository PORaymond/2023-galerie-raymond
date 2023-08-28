<?php
// *****************************************************************************************
// Description   : Classe abstraite parente de toutes les contrôleurs spécifiques
// Date        : 21 octobre 2022
// Auteurs      : Olivier Raymond et Elisabeth Tremblay
// *****************************************************************************************
//Créer une classe abstraite Controleur
abstract class Controleur
{
    // ******************* Attributs
    //déclarez un tableau qui contiendra toutes les erreurs
    protected $messagesErreur = array();
    protected $acteur = "visiteur";
    protected $bienvenue = "visiteur";
    // ******************* Constructeur vide
    //creer un constructeur sans paramètre
    public function __construct()
    {
        $this->determinerUtilisateur();
    }

    // ******************* Accesseurs
    //retourner le tableau de message erreurs

    public function determinerUtilisateur()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();

        if (isset($_SESSION['utilisateurConnecte'])) {
            $this->acteur = $_SESSION['utilisateurConnecte'];
        }
        if (isset($_SESSION['bienvenueClient'])) {
            $this->bienvenue = $_SESSION['bienvenueClient'];
        }
        if (isset($_SESSION['bienvenueAdmin'])) {
            $this->bienvenue = $_SESSION['bienvenueAdmin'];
        }
    }

    public function getMessagesErreur()
    {
        return $this->messagesErreur;
    }

    public function getActeur()
    {
        return $this->acteur;
    }

    // ******************* Méthode abstraite executer action
    // Cette méthode :
    //  - gère la session (s'il y en a une)
    //  - valide les données reçues en POST (s'il y en a)
    //  - effectue le travail requis par l'action (interactions avec les DAO, ...)
    //  - retourne le nom de la vue à appliquer (en format string, sans le chemin(path))
    // Créer la méthode abstraite executerAction

    public function getBienvenue()
    {
        return $this->bienvenue;
    }

    // ****************** Méthode privée

    abstract public function executerAction();
}

?>