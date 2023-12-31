<?php
	/* Description : interface à implémenter pour tous les DAO
	Date        : 21 octobre 2022
    Auteurs      : Olivier Raymond et Elisabeth Tremblay
	*/

	// ****** INLCUSIONS *******

	// Importe l'interface DAO et la classe Oeuvre
	// Donne accès à la classe de connexion à la BD
	// Pas besoin de la réimporter dans les classes implémente l'interface

	include_once('connexionBD.class.php');

	// ****** INTERFACE *******
	interface DAO {	
		// Cette méthode doit retourner l'objet dont la clé primaire a été reçu en paramètre
		// Notes : 1) On retourne null si non-trouvé, 
		//         2) Si la clé primaire est composée, alors le paramètre est un tableau assiociatif
		public static function chercher($cles); 
		// Cette méthode doit retourner une liste de tous les objets reliés à la table de la BD
		public static function chercherTous(); 
		// Comme la méthode chercherTous, mais en applicant le filtre (clause WHERE ...) reçue en param.
		public static function chercherAvecFiltre($filtre); 
		// Cette méthode insère l'objet reçu en paramètre dans la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		public static function inserer($unObjet); 
		// Cette méthode modifie tous les champs de l'objet reçu en paramètre dans la table
		public static function modifier($unObjet); 
		// Cette méthode supprime l'objet reçu en paramètre de la table
		public static function supprimer($unObjet); 
	}
?>