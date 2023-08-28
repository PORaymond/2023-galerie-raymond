<?php
/*
* Classe Client. Cette classe décrit les attributs des clients de la boutique en ligne.
* Par Elisabeth Tremblay et Olivier Raymond
* 24-09-2022
*/ 

class Client {
    //Les attributs
    private $idClient;
    private $nom;
    private $prenom;
    private $courriel;
    private $adresse;
    private $carteCredit;
    private $dateInscription;
    private $username;
    private $mdPasse;

    // Constructeur avec arguments
    public function __construct($idClient, $nom, $prenom, $courriel, $adresse, $carteCredit, $dateInscription, $username, $mdPasse){
        $this->idClient = $idClient;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->courriel = $courriel;
        $this->adresse = $adresse;
        $this->carteCredit = $carteCredit;
        $this->dateInscription = $dateInscription;
        $this->username = $username;
        $this->mdPasse = $mdPasse;
    }
    public function getIdClient() {return $this->idClient;}
	public function getNom() {return $this->nom;}
	public function getPrenom() {return $this->prenom;}
	public function getCourriel() {return $this->courriel;}
	public function getAdresse() {return $this->adresse;}
	public function getCarteCredit() {return $this->carteCredit;}
    public function getDateInscription() {return $this->dateInscription;}
    public function getUsername() {return $this->username;}
    public function getMdPasse(){return $this -> mdPasse;}

	public function setNom($nom) {$this->nom=$nom;}
	public function setPrenom($prenom) {$this->prenom=$prenom;}
	public function setCourriel($courriel) {$this->courriel=$courriel;}
    public function setAdresse($adresse) {$this->adresse=$adresse;}
    public function setCarteCredit($carteCredit) {$this->carteCredit=$carteCredit;}
    public function setDateInscription($dateInscription) {$this->dateInscription=$dateInscription;}
    public function setUsername($username){$this->username=$username;}
    public function setMdPasse($mdPasse) {$this->mdPasse=$mdPasse;}

    public function __toString()
    {
        return "[#client:". $this->idClient."] ". $this->nom .", " . $this->prenom;
    }

}