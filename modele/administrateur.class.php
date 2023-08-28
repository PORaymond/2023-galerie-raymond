<?php
    class  Administrateur{
        private $idAdministrateur;
        private $mdPasse;
        private $nom;
        private $prenom;
        private $username;

        public  function __construct($idAdministrateur, $nom, $prenom, $mdPasse, $username)
        {
            $this->idAdministrateur = $idAdministrateur;
            $this->mdPasse = $mdPasse;
            $this->nom = $nom;
            $this->prenom =$prenom;
            $this->username = $username;
        }

        public function getIdAdministrateur(){return $this->idAdministrateur;}
        public function getMdPasse(){return $this->mdPasse;}
        public function getNom(){return $this->nom;}
        public function getPrenom(){return $this->prenom;}
        public function getUsename(){return $this->username;}

        public function setIdAdministrateur($idAdministrateur){$this->idAdministrateur = $idAdministrateur; }
        public function setMdPasse($mdPasse){$this->mdPasse = $mdPasse;}
        public function setNom($nom){$this->nom = $nom;}
        public function setPrenom($prenom){$this->prenom = $prenom;}
        public function setUsername($username){$this->username = $username;}

        public function __toString(){
            return "[#Admin:". $this->idAdministrateur."] ". $this->nom .", " . $this->prenom;
        }
    }