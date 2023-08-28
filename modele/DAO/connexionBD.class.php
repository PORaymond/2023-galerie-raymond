<?php
	/* Description : classe permettant d'obtenir une connexion à une BD
	Date        : 21 octobre 2022
    Auteurs      : Olivier Raymond et Elisabeth Tremblay
	*/

	// ****** INLCUSIONS *******

	// Le fichier configDB.interface.php contient le mot de passe, le nom d’utilisateur
	// avec les constantes BD_HOTE, BD_NOM, BD_UTILISATEUR et BD_MOT_PASSE

	include_once('configs/configBD.interface.php');
	
	// ********* Classe englobante de PDO *************
	class ConnexionBD  {	
		// Attribut représentant la connexion à la BD (de type PDO)
         private static  $instance=null;
		// Constructeur de ConnexionDB inutilisable de l’extérieur
		 private function __construct()
		 {
			 
		 }
		// Fonction statique qui gère la création de l’instance PDO et la retourne.
		// Note : self:: représente le nom de classe courante ConnexionBD  
		public static function getInstance() {
			// Si l’instance de PDO n’exsite pas on la crée 
			if(self::$instance==null){

				$configuration="mysql:host=".ConfigBD::BD_HOTE.";dbname=".ConfigBD::BD_NOM;
				$utilisateur=ConfigBD::BD_UTILISATEUR;
				$motPasse=ConfigBD::BD_MOT_PASSE;
				// Note : self :: represente  le nom de classe courante 
				// La fonction statique qui gère la connexion de l'instance
			    self::$instance = new PDO($configuration,$utilisateur,$motPasse);
				// S'assurer que le les transactions se font avec les caractères UTF8
				self::$instance->exec("SET character_set_results = 'utf8'");	
				self::$instance->exec("SET character_set_client = 'utf8'");	
				self::$instance->exec("SET character_set_connection = 'utf8'");

			
			}
			// Maintenant qu’on est certain qu’elle existe on la retourne

			return self::$instance;

		}
	  
		// Fonction qui libère la connexion PDO (pour le garbage collector)
		public static function close() {
            self::$instance=null;
		}
	}
?>