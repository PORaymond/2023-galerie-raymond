<?php

class Categorie
{
    private $idCategorie;
    private $descCategorie;

    public function  __construct($idCategorie,$descCategorie)
    {
        $this->idCategorie = $idCategorie;
        $this->descCategorie= $descCategorie;
    }


    public function getIdCategorie(){return $this->idCategorie;}
    public function getDescCategorie(){return $this->descCategorie;}

    public function setIdCategorie($idCategorie){ $this->idCategorie = $idCategorie;}
    public function setDescCategorie($descCategorie){$this->descCategorie = $descCategorie;}

    public function __toString()
    {
        return "[#Catégorie :" . $this->idCategorie . "] " . $this->descCategorie;
    }

}