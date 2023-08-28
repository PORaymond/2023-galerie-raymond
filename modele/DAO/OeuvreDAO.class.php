<?php
	/* Description : DAO pour la classe Oeuvre de la BD galerie
	Date        : 21 octobre 2022
    Auteurs      : Olivier Raymond et Elisabeth Tremblay
	*/

	// ****** INCLUSIONS *******

	// Importe l'interface DAO et la classe Oeuvre
	include_once __DIR__."/DAO.interface.php";
	include_once __DIR__."/../oeuvre.class.php";


	// ****** CLASSE *******
	class OeuvreDAO implements DAO {

        public static function chercher($unCode)
        {
            try {
                $connexion = ConnexionBD::getInstance();
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }
            $uneOeuvre = null;
            $requete = $connexion->prepare("SELECT * FROM oeuvre WHERE idOeuvre=?");
            $requete->execute(array($unCode));
            if ($requete->rowCount() != 0) {
                $enr = $requete->fetch();

                $uneOeuvre = new Oeuvre(
                    $enr['idOeuvre'],
                    $enr['titre'],
                    $enr['description'],
                    $enr['prix'],
                    $enr['dateCreation'],
                    $enr['url_photo'],
                    $enr['url_photo_mini'],
                    $enr['idCommande'],
                    $enr['idCategorie'],
                    $enr['disponible']
                );
            }
            $requete->closeCursor();
            ConnexionBD::close();
            return $uneOeuvre;
        }

        public static function chercherParCategorie($categorie)
        {

            try {
                $connexion = ConnexionBD::getInstance();
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }

            $tableau = [];
            $requete = $connexion->prepare("SELECT * FROM oeuvre WHERE idCategorie=?");
            $requete->execute(array($categorie));
            foreach ($requete as $enr) {
                $uneOeuvre = new Oeuvre(
                    $enr['idOeuvre'],
                    $enr['titre'],
                    $enr['description'],
                    $enr['prix'],
                    $enr['dateCreation'],
                    $enr['url_photo'],
                    $enr['url_photo_mini'],
                    $enr['idCommande'],
                    $enr['idCategorie'],
                    $enr['disponible']
                );
                array_push($tableau, $uneOeuvre);
            }

            $requete->closeCursor();
            ConnexionBD::close();
            return $tableau;


        }
        public static function listeDesNumCategorie(){

            try {
                $connexion = ConnexionBD::getInstance();
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }

            $tabCategories = [];
            $requete = $connexion->prepare("SELECT DISTINCT (idCategorie) FROM oeuvre");
            $requete->execute(array());
            foreach ($requete as $uneCategorie) {

                array_push($tabCategories, $uneCategorie);
            }

            $requete->closeCursor();
            ConnexionBD::close();
            return $tabCategories;

        }

        public static function chercherTous()
        {
            try {
                $connexion = ConnexionBD::getInstance();
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }
            $tableau = [];

            $uneOeuvre = null;
            $requete = $connexion->prepare("SELECT * FROM oeuvre");
            $requete->execute();
            foreach ($requete as $enr) {
                $uneOeuvre = new Oeuvre(
                    $enr['idOeuvre'],
                    $enr['titre'],
                    $enr['description'],
                    $enr['prix'],
                    $enr['dateCreation'],
                    $enr['url_photo'],
                    $enr['url_photo_mini'],
                    $enr['idCommande'],
                    $enr['idCategorie'],
                    $enr['disponible']);

                // ajouter les produits dans le tableau un à la fois
                array_push($tableau, $uneOeuvre);
            }

            // fermer le curseur de la requête
            $requete->closeCursor();
            //et la connexion à la BD
            ConnexionBD::close();


            // retourner le tableau
            return $tableau;


        }

        public static function chercherAvecFiltre($filtre)
        {
            // obtenir la connexion
            try {
                $connexion = ConnexionBD::getInstance();
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }
            // initialisation du tableau vide
            $tableau = [];
            // Préparer une requête de type PDOStatement avec des paramètres SQL
            // $filtre = "like %FFd%";
            //
            // $filtre = "WHERE"
            $requete = $connexion->prepare("SELECT * FROM oeuvre " . $filtre);
            // Exécuter la requête
            $requete->execute();
            // Analyser les enregistrements s'il y en a
            foreach ($requete as $enr) {
                $uneOeuvre = new Oeuvre(
                    $enr['idOeuvre'],
                    $enr['titre'],
                    $enr['description'],
                    $enr['prix'],
                    $enr['dateCreation'],
                    $enr['url_photo'],
                    $enr['url_photo_mini'],
                    $enr['idCommande'],
                    $enr['idCategorie'],
                    $enr['disponible']
                );
                // ajouter les administrateurs dans le tableau un à la fois
                array_push($tableau, $uneOeuvre);
            }

            // fermer le curseur de la requête
            $requete->closeCursor();
            //et la connexion à la BD
            ConnexionBD::close();

            // retourner le tableau
            return $tableau;
        }

        public static function inserer($uneOeuvre)
        {
            // on essaie d’établir la connexion
            try {
                $connexion = ConnexionBD::getInstance();
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }
            // On prépare la commande insert
            $requete = $connexion->prepare("INSERT INTO 
            oeuvre (titre, description, prix, dateCreation, url_photo,idCommande, idCategorie)
            VALUES (?,?,?,?,?,?,?)");
            // On l’exécute, et on retourne l’état de réussite (true/false)
            $tableauInfos = [
                $uneOeuvre->getTitre(),
                $uneOeuvre->getDescription(),
                $uneOeuvre->getPrix(),
                $uneOeuvre->getDateCreation(),
                $uneOeuvre->getUrlPhoto(),
                $uneOeuvre->getUrlPhoto(),
                $uneOeuvre->getIdCommande(),
                $uneOeuvre->getIdCategorie(),
                $uneOeuvre->getDisponible()
                ];
            return $requete->execute($tableauInfos);
        }

         public static function modifier($uneOeuvre)
        {
            try {
                $connexion = ConnexionBD::getInstance();
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }
            // On prépare la commande update
            $requete = $connexion->prepare("UPDATE oeuvre SET titre=?, description=?, prix=? , dateCreation=?, url_photo=?, idCommande=?, idCategorie=? WHERE idOeuvre=?");

            // On l’exécute, et on retourne l’état de réussite (true/false)
            $tableauInfos = [
                $uneOeuvre->getTitre(),
                $uneOeuvre->getDescription(),
                $uneOeuvre->getPrix(),
                $uneOeuvre->getDateCreation(),
                $uneOeuvre->getUrlPhoto(),
                $uneOeuvre->getUrlPhotoMini(),
                $uneOeuvre->getIdCommande(),
                $uneOeuvre->getIdCategorie(),
                $uneOeuvre->getIdOeuvre(),
                $uneOeuvre->getDisponible()

            ];
            return $requete->execute($tableauInfos);

        }

        public static function modifierIDCommande($idCommande, $idOeuvre)
        {

            try {
                $connexion = ConnexionBD::getInstance();
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }
            // On prépare la commande update
            $requete = $connexion->prepare("UPDATE oeuvre SET idCommande=? WHERE idOeuvre=?; update oeuvre set disponible = false where idOeuvre = ". $idOeuvre);

            return $requete->execute(array($idCommande, $idOeuvre));

        }

        public static function supprimer($uneOeuvre)
        {
            try {
                $connexion = ConnexionBD::getInstance();
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }
            // On prépare la commande delete (on utilise le code seulement comme paramètre)
            $requete = $connexion->prepare("DELETE FROM oeuvre WHERE idOeuvre=?");
            // On l’exécute, et on retourne l’état de réussite (true/false)
            $tableauInfos = [$uneOeuvre->getIdOeuvre()];
            return $requete->execute($tableauInfos);
        }
    }
