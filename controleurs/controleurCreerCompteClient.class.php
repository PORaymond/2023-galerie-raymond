<?php

// *****************************************************************************************
// Description   : Contrôleur spécifique pour créer un nouveau compte client
// Date          : 21 octobre 2022
// Auteurs       : Elisabeth Tremblay
// *****************************************************************************************
include_once(__DIR__ . "/controleur.abstract.class.php");
include_once(__DIR__ . "/../modele/DAO/ClientDAO.class.php");
include_once(__DIR__ . "/../modele/client.class.php");

class CreerCompteClient extends Controleur
{
    private $tabClients;

    public function __construct()
    {
        parent::__construct();
        $this->tabClients = array();
    }

    public function getTabClients(): array
    {
        return $this->tabClients;
    }

    public function executerAction()
    {

        $nouveauClient = null;

        if (isset($_POST['nom_client'])) {

            $idClient=0;
            $dateInscr = date("Y-m-d");
            $nouveauClient = new Client(
                $idClient,
                $_POST['nom_client'],
                $_POST['prenom'],
                $_POST['courriel'],
                $_POST['adresse'],
                $_POST['carteCredit'],
                $dateInscr,
                $_POST['username'],
                $_POST['mdPasse']
            );

            var_dump($dateInscr);
            $test = ClientDAO::inserer($nouveauClient);
            var_dump($test);
            var_dump($nouveauClient);

        }
        $this->tabClients = ClientDAO::chercherTous();

        if ($nouveauClient === null) {
            array_push($this->messagesErreur, "Erreur lors de la création du compte.");

            return "loginClient";

        }
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();

        $_SESSION['nom_utilisateur'] = $nouveauClient->getPrenom() . " " . $nouveauClient->getNom();
        return "succesNvCompte";
    }


}