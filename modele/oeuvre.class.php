<?php

class Oeuvre {
	// Attributs
	private $idOeuvre;
	private $titre;
	private $description;
	private $prix;
	private $dateCreation;
	private $urlPhoto;
	private $urlPhotoMini;
	private $idCommande;
	private $idCategorie;
	private $disponible;

	// Constructeur
	public function __construct($idOeuvre, $titre, $description, $prix, $dateCreation, $urlPhoto, $urlPhotoMini, $idCommande, $idCategorie, $disponible){
		$this->idOeuvre=$idOeuvre;
		$this->titre=$titre;
		$this->description=$description;
		$this->prix=$prix;
		$this->dateCreation=$dateCreation;
		$this->urlPhoto=$urlPhoto;
		$this->urlPhotoMini=$urlPhotoMini;
		$this->idCommande=$idCommande;
		$this->idCategorie=$idCategorie;
		$this->disponible=$disponible;
	}

	
	// Accesseurs et mutateurs
	public function getIdOeuvre() {return $this->idOeuvre;}
	public function getTitre() {return $this->titre;}
	public function getDescription() {return $this->description;}
	public function getDateCreation() { return $this->dateCreation; }
	public function getUrlPhoto() {return $this->urlPhoto;}
	public function getUrlPhotoMini() {return $this->urlPhotoMini;}
	public function getPrix() {return $this->prix;}
	public function getIdCommande() { return $this->idCommande; }
	public function getIdCategorie() { return $this->idCategorie; }
	public function getDisponible() { return $this->disponible; }

	public function setTitre($valeur) {$this->titre=$valeur;}
	public function setUrlPhoto($valeur) {$this->urlPhoto=$valeur;}
	public function setUrlPhotoMini($valeur){$this->urlPhotoMini= $valeur;}
	public function setPrix($valeur) {$this->prix=$valeur;}
	public function setDisponible($disponible) { $this->disponible = $disponible; }

	// Affichage
	public function __toString(){
		$message="[#".$this->idOeuvre."] ".$this->titre." - ".$this->description;
		$message.=" @".round($this->prix,2)."$";
		return $message;
	}
}
?>






