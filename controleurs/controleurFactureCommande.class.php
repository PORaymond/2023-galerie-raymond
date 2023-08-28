<?php

// *****************************************************************************************
// Description   : Contrôleur pour afficher la facture de la commande
// Date          : 21 octobre 2022
// Auteurs       : Elisabeth Tremblay
// *****************************************************************************************
include_once(__DIR__ . "/controleur.abstract.class.php");
include_once(__DIR__ . "/../modele/DAO/ClientDAO.class.php");
include_once(__DIR__ . "/../modele/client.class.php");
include_once(__DIR__ . "/../modele/DAO/OeuvreDAO.class.php");
include_once(__DIR__ . "/../modele/oeuvre.class.php");
include_once(__DIR__ . "/../modele/DAO/commandeDAO.class.php");
include_once(__DIR__ . "/../modele/commande.class.php");

class FactureCommande extends Controleur
{
    // ******************* Attributs
    private $tabCommande;
    private $tabOeuvres;

    // ******************* Constructeur vide
    public function __construct()
    {
        $this->tabOeuvres = array();
        $this->tabCommande = array();
        parent::__construct();
    }

    public function getTabCommande(): array
    {
        return $this->tabCommande;
    }

    public function getTabOeuvres(): array
    {
        return $this->tabOeuvres;
    }

    public function executerAction()
    {
        $this->nouvelleCommande();
        return "pageFactureCommande";

    }

    public function nouvelleCommande()
    {
        $idClient = $_SESSION['idUtilisateur'];

        $tabIdOeuvresCommande = $_SESSION['tableauOeuvre'];
        if (!empty($tabIdOeuvresCommande)) {

            $idCommande = 0; // s'autoincremente donc seulement initialisation de la variable
            $nouvelleCommande = new Commande(
                $idCommande,
                date("Y-m-d"),
                $idClient
            );
            // insertion de la commande dans la BDD :
            // un numero de commande est genere
            CommandeDAO::inserer($nouvelleCommande);
            // on recupere le id de la derniere commande creee
            $idNouvelleCommande = CommandeDAO::chercherLastID();

            foreach ($tabIdOeuvresCommande as $unIdOeuvreCommande) {
                // update une oeuvre et ajoute le #id de la nouvelle commande
                OeuvreDAO::modifierIDCommande($idNouvelleCommande, $unIdOeuvreCommande);
            }
            // vider le panier et mettre les oeuvres achetees non disponibles

                $_SESSION['tableauOeuvre'] = array();
                $_SESSION['nbOeuvresPanier'] = 0;


            return OeuvreDAO::chercherAvecFiltre("where idCommande = " . $idNouvelleCommande);

        } else array_push($this->messagesErreur, "Le panier est vide.");

        return null;
    }

}

?>