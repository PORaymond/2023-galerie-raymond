<?php
/* Description : DAO pour la classe Categorie de la BD galerie
Date        : 21 octobre 2022
Auteurs      : Olivier Raymond et Elisabeth Tremblay
*/

include_once(__DIR__."/DAO.interface.php");
include_once(__DIR__."/../categorie.class.php");
class CategorieDao implements DAO
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
            $uneCategorie= null;
            // Préparer une requête de type PDOStatement avec des paramètres SQL
            $requete = $connexion->prepare('SELECT * FROM categorie WHERE idCategorie=?');
            // Exécuter la requête
            $requete->execute(array($cles));
            // Analyser l’enregistrement, s’il existe et créer l’instance unCategorie
            if ($requete->rowCount() != 0) {
                $enr = $requete->fetch();
                $uneCategorie = new Categorie(
                    $enr['idCategorie'],
                    $enr['descCategorie']
                );
            }
            // fermer le curseur de la requête
            $requete->closeCursor();
            //et fermer la connexion à la BD
            ConnexionBD::close();
            // retourner unCategorie
            return $uneCategorie;
        }
    }

    public static function chercherAvecFiltre($filtre): array
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // initialisation du tableau vide
        $tableau = [];
        // Préparer une requête de type PDOStatement avec des paramètres SQL
        $requete = $connexion->prepare("SELECT * FROM categorie " . $filtre);
        // Exécuter la requête
        $requete->execute();
        // Analyser les enregistrements s'il y en a
        foreach ($requete as $enr) {
            $uneCategorie = new Categorie(
                $enr['idCategorie'],
                $enr['descCategorie']
            );
            array_push($tableau, $uneCategorie);
        }

        // fermer le curseur de la requête
        $requete->closeCursor();
        //et la connexion à la BD
        ConnexionBD::close();

        // retourner le tableau
        return $tableau;
    }

    public static function chercherTous(): array
    {
        return self::chercherAvecFiltre("");
    }

    public static function inserer($uneCategorie): bool
    {
        // on essaie d’établir la connexion
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // On prépare la commande insert
        $requete = $connexion->prepare("INSERT INTO 
            categorie (descCategorie)
            VALUES (?)");
        // On l’exécute, et on retourne l’état de réussite (true/false)
        $tableauInfos = [
            $uneCategorie->getDescCategorie()];
        return $requete->execute($tableauInfos);

    }

    public static function modifier($uneCategorie): bool
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // On prépare la commande update
        $requete = $connexion->prepare("UPDATE categorie SET descCategorie=? WHERE idCategorie=?");

        // On l’exécute, et on retourne l’état de réussite (true/false)
        $tableauInfos = [
            $uneCategorie->getdescCategorie(), $uneCategorie->getIdCategorie()
        ];
        return $requete->execute($tableauInfos);

    }


    public static function supprimer($uneCategorie): bool
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        // On prépare la commande delete (on utilise le code seulement comme paramètre.)
        $requete = $connexion->prepare("DELETE FROM categorie WHERE idCategorie=?");
        // On l’exécute, et on retourne l’état de réussite (true/false)
        $tableauInfos = [$uneCategorie->getIdCategorie()];
        return $requete->execute($tableauInfos);
    }
}