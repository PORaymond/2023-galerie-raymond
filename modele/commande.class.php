<?php

class Commande
{
    private $idCommande;
    private $dateCommande;
    private $idClient;

    /**
     * @param $idCommande
     * @param $dateCommande
     * @param $idClient
     */
    public function __construct($idCommande, $dateCommande, $idClient)
    {
        $this->idCommande = $idCommande;
        $this->dateCommande = $dateCommande;
        $this->idClient = $idClient;
    }

    public function getIdCommande(){return $this->idCommande;}
    public function getDateCommande(){return $this->dateCommande;}
    public function getIdClient(){return $this->idClient;}

    public function setIdCommande($valeur){$this->dateCommande = $valeur;}
    public function setDateCommande($valeur) {$this->dateCommande = $valeur;}
    public function setIdClient($valeur){$this->idClient = $valeur;}

    public function __toString(){
        return "[#Commande : " . $this->idCommande . "] date : " . $this->dateCommande . " [#client : " . $this->idClient . "]";
    }

}