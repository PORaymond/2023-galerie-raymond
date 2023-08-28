<?php
/* Description : DAO pour la classe Commande de la BD galerie
Date        : 21 octobre 2022
Auteurs      : Olivier Raymond et Elisabeth Tremblay
*/

include_once(__DIR__ . "/DAO.interface.php");
include_once(__DIR__ . "/../commande.class.php");

class CommandeDAO implements DAO
{

    public static function chercher($cles)
    {
        {
            try {
                $connexion = ConnexionBD::getInstance();
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }

            // valeur par défaut pour la variable à retourner si non trouvée
            $uneCommande = null;
            // Préparer une requête de type PDOStatement avec des paramètres SQL
            $requete = $connexion->prepare('SELECT * FROM commande WHERE idCommande=?');
            // Exécuter la requête
            $requete->execute(array($cles));
            // Analyser l’enregistrement, s’il existe et créer l’instance unCommande
            if ($requete->rowCount() != 0) {
                $enr = $requete->fetch();
                $uneCommande = new Commande(
                    $enr['idCommande'],
                    $enr['dateCommande'],
                    $enr['idClient']
                );
            }
            // fermer le curseur de la requête
            $requete->closeCursor();
            //et fermer la connexion à la BD
            ConnexionBD::close();
            // retourner unCommande
            return $uneCommande;
        }
    }

    public static function chercherLastID()
    {
        {
            try {
                $connexion = ConnexionBD::getInstance();
            } catch (Exception $e) {
                throw new Exception("Impossible d’obtenir la connexion à la BD.");
            }

            // valeur par défaut pour la variable à retourner si non trouvée
            $uneCommande = null;
            // Préparer une requête de type PDOStatement avec des paramètres SQL
            $requete = $connexion->prepare('SELECT idCommande FROM commande order by idCommande desc limit 1');
            // Exécuter la requête
            $requete->execute(array());
            // Analyser l’enregistrement, s’il existe et créer l’instance unCommande
            if ($requete->rowCount() != 0) {
                //la méthode fetch : pour obtenir un enregistrement(ligne par ligne)
                //à la fois dans un tableau associatif.
                $enr = $requete->fetch();
                $uneCommande = $enr['idCommande'];
            }
            // fermer le curseur de la requête
            $requete->closeCursor();
            //et fermer la connexion à la BD
            ConnexionBD::close();
            // retourner unCommande
            return $uneCommande;
        }
    }

    public static function chercherTous(): array
    {
        return self::chercherAvecFiltre("");
    }

    public static function chercherAvecFiltre($filtre): array
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
        $requete = $connexion->prepare("SELECT * FROM commande " . $filtre);
        // Exécuter la requête
        $requete->execute();
        // Analyser les enregistrements s'il y en a
        foreach ($requete as $enr) {
            $uneCommande = new Commande(
                $enr['idCommande'],
                $enr['dateCommande'],
                $enr['idClient']
            );
            array_push($tableau, $uneCommande);
        }

        // fermer le curseur de la requête
        $requete->closeCursor();
        //et la connexion à la BD
        ConnexionBD::close();

        // retourner le tableau
        return $tableau;
    }

    public static function inserer($uneCommande): bool
    {
        // on essaie d’établir la connexion
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // On prépare la commande insert
        $requete = $connexion->prepare("INSERT INTO 
            commande (dateCommande, idClient)
            VALUES (?,?)");
        // On l’exécute, et on retourne l’état de réussite (true/false)
        $tableauInfos = [
            $uneCommande->getDateCommande(), $uneCommande->getIdClient()];
        return $requete->execute($tableauInfos);

    }

    public static function modifier($uneCommande): bool
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // On prépare la commande update
        $requete = $connexion->prepare("UPDATE commande SET dateCommande=?, idClient =?  WHERE idCommande=?");

        // On l’exécute, et on retourne l’état de réussite (true/false)
        $tableauInfos = [
            $uneCommande->getDateCommande(), $uneCommande->getIdClient(),
            $uneCommande->getIdCommande()
        ];
        return $requete->execute($tableauInfos);

    }


    public static function supprimer($uneCommande): bool
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // On prépare la commande delete (on utilise le code seulement comme paramètre.)
        $requete = $connexion->prepare("DELETE FROM commande WHERE idCommande=?");
        // On l’exécute, et on retourne l’état de réussite (true/false)
        $tableauInfos = [$uneCommande->getIdCommande()];
        return $requete->execute($tableauInfos);
    }

    public static function obtenirFactureOeuvres($idCommande)
    {

        // obtenir la connexion
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // initialisation du tableau vide
        $tableau = [];
        $queryFacture = "select * from commande join client c on c.idClient = commande.idClient join oeuvre o on commande.idCommande = o.idCommande where commande.idCommande = ? order by commande.idCommande desc";

        // Préparer une requête de type PDOStatement avec des paramètres SQL
        $requete = $connexion->prepare($queryFacture);
        // Exécuter la requête
        $requete->execute(array($idCommande));
        // Analyser les enregistrements s'il y en a
        foreach ($requete as $enr) {
            $enr = [
                $enr['titre'],
                $enr['description'],
                $enr['prix'],
                $enr['url_photo_mini'],
            ];
            array_push($tableau, $enr);
        }
        // fermer le curseur de la requête
        $requete->closeCursor();
        //et la connexion à la BD
        ConnexionBD::close();
        // retourner le tableau
        return $tableau;
    }

    public static function obtenirFactureInfosClient($idClient)
    {
        // obtenir la connexion
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // initialisation du tableau vide
        $tableau = [];
        $queryFacture = "select * from commande join client c on c.idClient = commande.idClient join oeuvre o on commande.idCommande = o.idCommande where c.idClient = ? order by c.idClient desc limit 1";

        // Préparer une requête de type PDOStatement avec des paramètres SQL
        $requete = $connexion->prepare($queryFacture);
        // Exécuter la requête
        $requete->execute(array($idClient));
        // Analyser les enregistrements s'il y en a
        foreach ($requete as $enr) {
            $enr = [
                $enr['idCommande'],
                $enr['idClient'],
                $enr['prenom'],
                $enr['nom'],
                $enr['courriel'],
                $enr['adresse'],
                $enr['carteCredit']
            ];
            array_push($tableau, $enr);
        }
        // fermer le curseur de la requête
        $requete->closeCursor();
        //et la connexion à la BD
        ConnexionBD::close();
        // retourner le tableau
        return $tableau;
    }
}